<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servers Model
 *
 * @property \App\Model\Table\StoragesTable|\Cake\ORM\Association\HasMany $Storages
 *
 * @method \App\Model\Entity\Server get($primaryKey, $options = [])
 * @method \App\Model\Entity\Server newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Server[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Server|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Server patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Server[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Server findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServersTable extends Table
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

        $this->setTable('servers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Storages', [
            'foreignKey' => 'server_id'
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
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('ip')
            ->allowEmpty('ip');

        $validator
            ->boolean('condition')
            ->allowEmpty('condition');

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
        $rules->add($rules->isUnique(['id']))
            ->add($rules->isUnique(['name']))
            ->add($rules->isUnique(['ip']));

        return $rules;
    }

    /**
     * ローカルホストの情報からデフォルトデータを作る
     * @return \App\Model\Entity\Server
     */
    public function getDefaultSet()
    {
        $data = $this->newEntity();
        $data->name = gethostname();
        $data->ip = gethostbyname($data->name);

        $data->storages = $this->Storages->getDefaultSet();


        return $data;
    }
}
