<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Reservedetail Controller
 *
 * @property \App\Model\Table\ReservedetailTable $Reservedetail
 *
 * @method \App\Model\Entity\Reservedetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservedetailController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reservedetail = $this->paginate($this->Reservedetail);

        $this->set(compact('reservedetail'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservedetail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservedetail = $this->Reservedetail->get($id, [
            'contain' => []
        ]);

        $this->set('reservedetail', $reservedetail);
    }

    public function sync()
    {
        $json = json_decode($this->stripQutos(stripslashes(implode("",$this->request->getData()))), Reservedetail::class);

        $response = $this->response->withStringBody('Success');

        foreach($json as $result)
        {
            if($this->Reservedetail->exists(['ReserveKey'=>$result['ReserveKey']]))
            {
                 $reserveDetail = $this->Reservedetail->get($result['ReserveKey'], [
                    'contain' => []
                 ]);

                if($this->saveDetail($reserveDetail, $result)){
                    $response = $this->response->withStringBody('Failed');
                }
            }
            else
            {
                $reserveDetail = $this->Reservedetail->newEntity();
                if($this->saveDetail($reserveDetail, $result)){
                    $response = $this->response->withStringBody('Failed');
                }
            }
        }

        return $response;
    }
    
    public function stripQutos($text) {
      $unquoted = preg_replace('/(^[\"\']|[\"\']$)/', '', $text);
      return $unquoted;
    } 
    
    public function saveDetail($reserveDetail = null, $result = null)
    {
        $reserveDetail = $this->Reservedetail->patchEntity($reserveDetail, $result);

        if($this->Reservedetail->save($reserveDetail))
        {
            return false;
        }

        return true;
    }
}
