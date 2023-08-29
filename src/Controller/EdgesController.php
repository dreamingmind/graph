<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Edges Controller
 *
 * @property \App\Model\Table\EdgesTable $Edges
 */
class EdgesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Edges->find()
            ->contain(['Nodes', 'Graphs']);
        $edges = $this->paginate($query);

        $this->set(compact('edges'));
    }

    /**
     * View method
     *
     * @param string|null $id Edge id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $edge = $this->Edges->get($id, [
            'contain' => ['Nodes', 'Graphs'],
        ]);

        $this->set(compact('edge'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $edge = $this->Edges->newEmptyEntity();
        if ($this->request->is('post')) {
            $edge = $this->Edges->patchEntity($edge, $this->request->getData());
            if ($this->Edges->save($edge)) {
                $this->Flash->success(__('The edge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The edge could not be saved. Please, try again.'));
        }
        $nodes = $this->Edges->Nodes->find('list', ['limit' => 200])->all();
        $graphs = $this->Edges->Graphs->find('list', ['limit' => 200])->all();
        $this->set(compact('edge', 'nodes', 'graphs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Edge id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $edge = $this->Edges->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $edge = $this->Edges->patchEntity($edge, $this->request->getData());
            if ($this->Edges->save($edge)) {
                $this->Flash->success(__('The edge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The edge could not be saved. Please, try again.'));
        }
        $nodes = $this->Edges->Nodes->find('list', ['limit' => 200])->all();
        $graphs = $this->Edges->Graphs->find('list', ['limit' => 200])->all();
        $this->set(compact('edge', 'nodes', 'graphs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Edge id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $edge = $this->Edges->get($id);
        if ($this->Edges->delete($edge)) {
            $this->Flash->success(__('The edge has been deleted.'));
        } else {
            $this->Flash->error(__('The edge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
