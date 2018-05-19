<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoragesLogs Model
 *
 * @property \App\Model\Table\StoragesTable|\Cake\ORM\Association\BelongsTo $Storages
 *
 * @method \App\Model\Entity\StoragesLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoragesLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoragesLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoragesLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoragesLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoragesLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoragesLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoragesLogsTable extends StoragesLogsBaseTable
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

        $this->setTable('storages_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Storages', [
            'foreignKey' => 'storage_id'
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
            ->scalar('place')
            ->allowEmpty('place');

        $validator
            ->scalar('memo')
            ->allowEmpty('memo');

        $validator
            ->integer('capacity')
            ->allowEmpty('capacity');

        $validator
            ->integer('limit_remain')
            ->allowEmpty('limit_remain');

        $validator
            ->integer('files_count')
            ->allowEmpty('files_count');

        $validator
            ->integer('directories_count')
            ->allowEmpty('directories_count');

        $validator
            ->integer('used_size')
            ->allowEmpty('used_size');

        $validator
            ->boolean('condition')
            ->allowEmpty('condition');

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
        $rules->add($rules->existsIn(['storage_id'], 'Storages'));

        return $rules;
    }
}
