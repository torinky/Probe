<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Datasources Model
 *
 * @property \App\Model\Table\DatasourcesLogsTable|\Cake\ORM\Association\HasMany $DatasourcesLogs
 *
 * @method \App\Model\Entity\Datasource get($primaryKey, $options = [])
 * @method \App\Model\Entity\Datasource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Datasource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Datasource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Datasource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Datasource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Datasource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DatasourcesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('datasources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('DatasourcesLogs', [
            'foreignKey' => 'datasource_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('className')
            ->allowEmpty('className');

        $validator
            ->scalar('driver')
            ->allowEmpty('driver');

        $validator
            ->scalar('host')
            ->allowEmpty('host');

        $validator
            ->scalar('memo')
            ->allowEmpty('memo');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
