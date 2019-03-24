<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reserves Controller
 *
 * @property \App\Model\Table\ReservesTable $Reserves
 *
 * @method \App\Model\Entity\Reserve[] paginate($object = null, array $settings = [])
 */
class ReservesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reserves = $this->paginate($this->Reserves);

        $this->set(compact('reserves'));
        $this->set('_serialize', ['reserves']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserve = $this->Reserves->get($id, [
            'contain' => []
        ]);

        $this->set('reserve', $reserve);
        $this->set('_serialize', ['reserve']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserve = $this->Reserves->newEntity();
        if ($this->request->is('post')) {
            $reserve = $this->Reserves->patchEntity($reserve, $this->request->getData());
            if ($this->Reserves->save($reserve)) {
                $this->Flash->success(__('The reserve has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserve could not be saved. Please, try again.'));
        }
        $this->set(compact('reserve'));
        $this->set('_serialize', ['reserve']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserve = $this->Reserves->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserve = $this->Reserves->patchEntity($reserve, $this->request->getData());
            if ($this->Reserves->save($reserve)) {
                $this->Flash->success(__('The reserve has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserve could not be saved. Please, try again.'));
        }
        $this->set(compact('reserve'));
        $this->set('_serialize', ['reserve']);
    }
    
    public function pull()
    {
        $id = $this->request->getQuery('id');
        $reserves = $this->Reserves->find('all')
            ->where(['Reserves.Seq =' => $id]);
        
        $tasks_json = json_encode($reserves);

        $response = $this->response->withStringBody($tasks_json);

        return $response;
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserve = $this->Reserves->get($id);
        if ($this->Reserves->delete($reserve)) {
            $this->Flash->success(__('The reserve has been deleted.'));
        } else {
            $this->Flash->error(__('The reserve could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
