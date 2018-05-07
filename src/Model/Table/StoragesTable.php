<?php
namespace App\Model\Table;
require(__DIR__ . '/../../../vendor/phpclasses/win-logical-drives/LogicalDrives.phpclass');

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storages Model
 *
 * @property \App\Model\Table\ServersTable|\Cake\ORM\Association\BelongsTo $Servers
 *
 * @method \App\Model\Entity\Storage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Storage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Storage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Storage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Storage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Storage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Storage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoragesTable extends Table
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

        $this->setTable('storages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Servers', [
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
        $rules->add($rules->existsIn(['server_id'], 'Servers'));

        return $rules;
    }

    /**
     * ローカルホストの情報からデフォルトセットを作る
     * @return array(\App\Model\Entity\Storage)
     */
    public function getDefaultSet()
    {
        $data = [];
        $ld = new \LogicalDrives ();
        // Show assigned drive letters, with their label
        // Note that the $ld object can be accessed as an array, providing the drive letter as an index
        // (the drive letter can be followed by an optional semicolon and is not case-sensitive)
//        debug("Assigned drives      :\n");

        foreach ($ld->GetAssignedDrives() as $drive_letter) {
            $storage = $this->newEntity();
            $storage->name = $drive_letter;
            $data[] = $storage;
        }
        return $data;

    }
}
