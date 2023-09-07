<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Node;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nodes Model
 *
 * @property \App\Model\Table\GraphsTable&\Cake\ORM\Association\BelongsTo $Graphs
 * @method \App\Model\Entity\Node newEmptyEntity()
 * @method \App\Model\Entity\Node newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Node[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Node get($primaryKey, $options = [])
 * @method \App\Model\Entity\Node findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Node patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Node[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Node|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Node saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Node[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Node[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Node[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Node[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NodesTable extends Table
{
    use LocatorAwareTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('nodes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Graphs', [
            'foreignKey' => 'graph_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('Edges');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->integer('metadata_id')
            ->allowEmptyString('metadata_id');

        $validator
            ->nonNegativeInteger('graph_id')
            ->notEmptyString('graph_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('graph_id', 'Graphs'), ['errorField' => 'graph_id']);

        return $rules;
    }

    /**
     * @param \App\Model\Entity\Node $target the node to be replaced
     * @param \App\Model\Entity\Node $replacement the replacement node
     * @param \Cake\Datasource\EntityInterface|null $edge_metadata replacement Edge metadata
     * @return bool
     */
    public function replace(
        Node $target,
        Node $replacement,
        ?EntityInterface $edge_metadata = null
    ): bool {
        return true;
    }

    /**
     * Create an Edge connecting two Nodes
     *
     * @param \App\Model\Entity\Node $origin an existing node
     * @param \App\Model\Entity\Node $destination the node to connect to origin
     * @param \Cake\Datasource\EntityInterface|null $edge_metadata data to explain the edge
     * @return bool
     */
    public function join(
        Node $origin,
        Node $destination,
        ?EntityInterface $edge_metadata = null
    ): EntityInterface|bool {
        $Edges = $this->fetchTable('Edges');

        $entity = $Edges->newEntity([
            'node_a_id' => $origin->id,
            'node_b_id' => $destination->id,
            'name' => 'link',
            'graph_id' => $origin->graph_id,
        ]);

        $Edges->save($entity);

        return $entity;
    }

    /**
     * Insert a node between a Node and a set of other Nodes
     *
     * Eliminates the existing Edge/Edges between $start
     * and $end or any Nodes listed in $end[] by connecting $start
     * to $insert and converting all $start to $end Edges into
     * $insert to $end Edges. Will create Edges to all
     * named $end Nodes whether Edges to them previously
     * existed or not.
     *
     * A null provided for $end will gather all Nodes
     * connected to $start and use them as $end[]
     *
     * @param \App\Model\Entity\Node $start a node to treat as a parent
     * @param \App\Model\Entity\Node|\App\Model\Entity\Node[]|null $end nodes to treat as children
     * @param \App\Model\Entity\Node $insert a node to insert between parent and children
     * @param \Cake\Datasource\EntityInterface|null $start_edge_metadata parent-insert edge metadata
     * @param \Cake\Datasource\EntityInterface|\Cake\Datasource\EntityInterface[]|null $end_edge_metadata insert-children edge metadata
     * @return bool
     */
    public function insert(
        Node $start,
        Node $end,
        Node $insert,
        ?EntityInterface $start_edge_metadata = null,
        ?EntityInterface $end_edge_metadata = null
    ): bool {
        return true;
    }
}
