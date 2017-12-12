<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 *
 * @method \App\Model\Entity\Task get($primaryKey, $options = [])
 * @method \App\Model\Entity\Task newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Task[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Task|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Task[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Task findOrCreate($search, callable $callback = null, $options = [])
 */
class TasksTable extends Table
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

        $this->setTable('tasks');
        $this->setDisplayField('TargetYearMonthDay');
        $this->setPrimaryKey('TargetYearMonthDay');
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
            ->scalar('TargetYearMonthDay')
            ->allowEmpty('TargetYearMonthDay', 'create');

        $validator
            ->scalar('TargetYearMonth')
            ->allowEmpty('TargetYearMonth');

        $validator
            ->scalar('Day')
            ->allowEmpty('Day');

        $validator
            ->scalar('StartTime')
            ->allowEmpty('StartTime');

        $validator
            ->scalar('EndTime')
            ->allowEmpty('EndTime');

        $validator
            ->scalar('WorkTime')
            ->allowEmpty('WorkTime');

        $validator
            ->scalar('WorkTimeCompany')
            ->allowEmpty('WorkTimeCompany');

        $validator
            ->scalar('StartLocation')
            ->allowEmpty('StartLocation');

        $validator
            ->scalar('EndLocation')
            ->allowEmpty('EndLocation');

        $validator
            ->scalar('Notes')
            ->allowEmpty('Notes');

        $validator
            ->boolean('StartOn')
            ->allowEmpty('StartOn');

        $validator
            ->boolean('EndOn')
            ->allowEmpty('EndOn');

        $validator
            ->boolean('NeedApplication')
            ->allowEmpty('NeedApplication');

        $validator
            ->boolean('HaveTask')
            ->allowEmpty('HaveTask');

        return $validator;
    }
}
