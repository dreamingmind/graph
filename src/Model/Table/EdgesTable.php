<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Edges Model
 *
 * @property \App\Model\Table\NodesTable&\Cake\ORM\Association\BelongsTo $NodeA
 * @property \App\Model\Table\NodesTable&\Cake\ORM\Association\BelongsTo $NodeB
 * @property \App\Model\Table\GraphsTable&\Cake\ORM\Association\BelongsTo $Graphs
 *
 * @method \App\Model\Entity\Edge newEmptyEntity()
 * @method \App\Model\Entity\Edge newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Edge[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Edge get($primaryKey, $options = [])
 * @method \App\Model\Entity\Edge findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Edge patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Edge[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Edge|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Edge saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Edge[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Edge[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Edge[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Edge[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EdgesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('edges');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('NodeA', [
            'className' => 'Nodes',
            'foreignKey' => 'node_b_id',
        ]);

        $this->belongsTo('NodeB', [
            'className' => 'Nodes',
            'foreignKey' => 'node_b_id',
        ]);

        $this->belongsTo('Graphs', [
            'foreignKey' => 'graph_id',
            'joinType' => 'INNER',
        ]);
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
            ->nonNegativeInteger('node_a_id')
            ->notEmptyString('node_a_id');

        $validator
            ->nonNegativeInteger('node_b_id')
            ->notEmptyString('node_b_id');

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
        $rules->add($rules->existsIn('node_a_id', 'Nodes'), ['errorField' => 'node_a_id']);
        $rules->add($rules->existsIn('node_b_id', 'Nodes'), ['errorField' => 'node_b_id']);
        $rules->add($rules->existsIn('graph_id', 'Graphs'), ['errorField' => 'graph_id']);

        return $rules;
    }
}
