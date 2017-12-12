<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\ Hash;


/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function sync()
    {
        $articles = $this->paginate($this->Articles);
        
        $articles_json = json_decode(json_encode($articles), Articles::class);

        $json = json_decode($this->request->getData('json'), Articles::class);

        $res = Hash::merge($articles_json, $json);

        foreach($res as $r)
        {
            if($this->Articles->exists(['id'=>$r['id']]))
            {
                 $article = $this->Articles->get($r['id'], [
                    'contain' => []
                 ]);

                 $this->saveArticle($article, $r);
            }
            else
            {
                $article = $this->Articles->newEntity();
                $this->saveArticle($article, $r);
            }
        }
        
        $this->Flash->success(__('The articles has been saved.'));
        return $this->redirect(['action' => 'index']);
    }
    
    public function saveArticle($article = null, $r = null)
    {
        $article = $this->Articles->patchEntity($article, $r);
        if ($this->Articles->save($article)) {
            return;
        }

        $this->Flash->error(__('The articles could not be saved. Please, try again.'));
        return $this->redirect(['action' => 'index']);
    }
}
