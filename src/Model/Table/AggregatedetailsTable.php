<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Aggregatedetails Model
 *
 * @method \App\Model\Entity\Aggregatedetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aggregatedetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aggregatedetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aggregatedetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aggregatedetail|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aggregatedetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aggregatedetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aggregatedetail findOrCreate($search, callable $callback = null, $options = [])
 */
class AggregatedetailsTable extends Table
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

        $this->setTable('aggregatedetails');
        $this->setDisplayField('ReserveKey');
        $this->setPrimaryKey('ReserveKey');
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
            ->scalar('ReserveKey')
            ->maxLength('ReserveKey', 100)
            ->allowEmptyString('ReserveKey', 'create');

        $validator
            ->scalar('ReserveType')
            ->maxLength('ReserveType', 100)
            ->allowEmptyString('ReserveType');

        $validator
            ->scalar('Amount')
            ->maxLength('Amount', 20)
            ->allowEmptyString('Amount');

        return $validator;
    }

	public function aggregateAmount(){
	    $sql  = "DELETE FROM AGGREGATEDETAILS;";
		$sql .= "INSERT INTO AGGREGATEDETAILS";
        $sql .= "(SELECT A.RESERVEKEY, A.RESERVETYPE, SUM(A.AMOUNT) AMOUNT FROM (";
    	$sql .= " SELECT SUBSTRING(RESERVEKEY, 1, 8) RESERVEKEY, SUBSTRING_INDEX(RESERVEKEY, '-', -1) ";
    	$sql .= " RESERVETYPE, AMOUNT FROM RESERVEDETAIL) A";
    	$sql .= " GROUP BY A.RESERVEKEY, A.RESERVETYPE);";

		$connection = ConnectionManager::get('default');
        $connection->execute($sql);
    }
}
