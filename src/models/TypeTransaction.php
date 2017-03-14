<?php 
namespace Entity;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;
/**
 *  Model for Type Transaction
 * 	
 */

 class TypeTransaction extends \Spot\Entity
 {

 	protected static $table = 'type_transactions';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'         => ['type' => 'string', 'length' => 150, 'notnull' => true, 'required' => true],
            'slug'         => ['type' => 'string', 'length' => 150],
            'is_active'    => ['type' => 'smallint'],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'transactions' => $mapper->hasMany($entity, 'Entity\Transaction', 'id_transaction_type'),
        ];
    }
 } 