<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Aggregatedetails Controller
 *
 * @property \App\Model\Table\AggregatedetailsTable $Aggregatedetails
 *
 * @method \App\Model\Entity\Aggregatedetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AggregatedetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	$this->Aggregatedetails->aggregateAmount();
    	
        $aggregatedetails = $this->paginate($this->Aggregatedetails);

        $this->set(compact('aggregatedetails'));
    }
}
