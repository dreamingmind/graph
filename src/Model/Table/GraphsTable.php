<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Graphs Model
 *
 * @property \App\Model\Table\EdgesTable&\Cake\ORM\Association\HasMany $Edges
 * @property \App\Model\Table\NodesTable&\Cake\ORM\Association\HasMany $Nodes
 *
 * @method \App\Model\Entity\Graph newEmptyEntity()
 * @method \App\Model\Entity\Graph newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Graph[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Graph get($primaryKey, $options = [])
 * @method \App\Model\Entity\Graph findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Graph patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Graph[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Graph|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Graph saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Graph[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Graph[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Graph[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Graph[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GraphsTable extends Table
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

        $this->setTable('graphs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Edges', [
            'foreignKey' => 'graph_id',
        ]);
        $this->hasMany('Nodes', [
            'foreignKey' => 'graph_id',
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

        return $validator;
    }
}
