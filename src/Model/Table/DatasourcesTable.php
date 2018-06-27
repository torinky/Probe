<?php
namespace App\Model\Table;

use Cake\Validation\Validator;

/**
 * Datasources Model
 *
 * @property \App\Model\Table\DatasourcesLogsTable|\Cake\ORM\Association\HasMany $DatasourcesLogs
 * @property \App\Model\Table\TablesTable|\Cake\ORM\Association\HasMany $Tables
 *
 * @method \App\Model\Entity\Datasource get($primaryKey, $options = [])
 * @method \App\Model\Entity\Datasource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Datasource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Datasource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Datasource|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Datasource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Datasource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Datasource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DatasourcesTable extends DatasourcesBaseTable
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
        $this->hasMany('Tables', [
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
            ->scalar('username')
            ->allowEmpty('username');

        $validator
            ->scalar('databaseName')
            ->allowEmpty('databaseName');

        $validator
            ->integer('port')
            ->allowEmpty('port');

        $validator
            ->scalar('datasourceName')
            ->allowEmpty('datasourceName');

        return $validator;
    }

}
