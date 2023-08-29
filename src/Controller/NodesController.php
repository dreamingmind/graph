<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nodes Controller
 *
 * @property \App\Model\Table\NodesTable $Nodes
 */
class NodesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Nodes->find()
            ->contain(['Graphs']);
        $nodes = $this->paginate($query);

        $this->set(compact('nodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Node id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => ['Graphs'],
        ]);

        $this->set(compact('node'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $node = $this->Nodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $node = $this->Nodes->patchEntity($node, $this->request->getData());
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The node could not be saved. Please, try again.'));
        }
        $graphs = $this->Nodes->Graphs->find('list', ['limit' => 200])->all();
        $this->set(compact('node', 'graphs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Node id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $node = $this->Nodes->patchEntity($node, $this->request->getData());
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The node could not be saved. Please, try again.'));
        }
        $graphs = $this->Nodes->Graphs->find('list', ['limit' => 200])->all();
        $this->set(compact('node', 'graphs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Node id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $node = $this->Nodes->get($id);
        if ($this->Nodes->delete($node)) {
            $this->Flash->success(__('The node has been deleted.'));
        } else {
            $this->Flash->error(__('The node could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
