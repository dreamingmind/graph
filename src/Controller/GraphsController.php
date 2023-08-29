<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Graphs Controller
 *
 * @property \App\Model\Table\GraphsTable $Graphs
 */
class GraphsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Graphs->find();
        $graphs = $this->paginate($query);

        $this->set(compact('graphs'));
    }

    /**
     * View method
     *
     * @param string|null $id Graph id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $graph = $this->Graphs->get($id, [
            'contain' => ['Edges', 'Nodes'],
        ]);

        $this->set(compact('graph'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $graph = $this->Graphs->newEmptyEntity();
        if ($this->request->is('post')) {
            $graph = $this->Graphs->patchEntity($graph, $this->request->getData());
            if ($this->Graphs->save($graph)) {
                $this->Flash->success(__('The graph has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The graph could not be saved. Please, try again.'));
        }
        $this->set(compact('graph'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Graph id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $graph = $this->Graphs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $graph = $this->Graphs->patchEntity($graph, $this->request->getData());
            if ($this->Graphs->save($graph)) {
                $this->Flash->success(__('The graph has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The graph could not be saved. Please, try again.'));
        }
        $this->set(compact('graph'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Graph id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $graph = $this->Graphs->get($id);
        if ($this->Graphs->delete($graph)) {
            $this->Flash->success(__('The graph has been deleted.'));
        } else {
            $this->Flash->error(__('The graph could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
