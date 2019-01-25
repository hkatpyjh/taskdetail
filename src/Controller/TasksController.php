<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks *
 * @method \App\Model\Entity\Task[] paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($page = null)
    {
        if(!empty($page)){
            $config = [
                'page' => $page
            ];
            
            $tasks = $this->paginate($this->Tasks, $config);

            $this->set(compact('tasks'));
            $this->set('_serialize', ['tasks']);
            return;
        }

        $tasks = $this->paginate($this->Tasks);

        $this->set(compact('tasks'));
        $this->set('_serialize', ['tasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $page = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);

        $this->set('task', $task);
        $this->set(compact('page'));
        $this->set('_serialize', ['task']);
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $page = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                if(empty($page)){
                    return $this->redirect(['action' => 'index']);
                }
                else {
                    return $this->redirect(['action' => sprintf('index?page=%s',$page)]);
                }
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $this->set(compact('task'));
        $this->set(compact('page'));
        $this->set('_serialize', ['task']);
        $this->set('_serialize', ['page']);
    }

    public function pull()
    {
        $tasks = $this->Tasks->find('all');
        
        $tasks_json = json_encode($tasks);

        $response = $this->response->withStringBody($tasks_json);

        return $response;
    }

    public function sync()
    {
        $tasks = $this->paginate($this->Tasks);
        
        $tasks_json = json_decode(json_encode($tasks), true);
        
        $json = json_decode($this->request->getData("json"), true);
        var_dump($json);
 
        $results = Hash::merge($tasks_json, $json);

        $response = $this->response->withStringBody('Success');

        foreach($results as $result)
        {
            if($this->Tasks->exists(['TargetYearMonthDay'=>$result['TargetYearMonthDay']]))
            {
                 $task = $this->Tasks->get($result['TargetYearMonthDay'], [
                    'contain' => []
                 ]);

                if($this->saveTask($task, $result)){
                    $response = $this->response->withStringBody('Failed');
                }
            }
            else
            {
                $task = $this->Tasks->newEntity();
                if($this->saveTask($task, $result)){
                    $response = $this->response->withStringBody('Failed');
                }
            }
        }

        return $response;
    }
    
    public function saveTask($task = null, $result = null)
    {
        $task = $this->Tasks->patchEntity($task, $result);

        if($this->Tasks->save($task))
        {
            return false;
        }

        return true;
    }
}
