<?php 

namespace Entity;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;

/**
 *  Model for Transaction
 * 	
 */

 class Transaction extends \Spot\Entity
 {

 	protected static $table = 'transactions';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'id_public' => ['type' => 'string', 'required' => true, 'length' => 50, 'unique' => true],
            'id_transaction_type' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_contry' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'code_product' => ['type' => 'string', 'required' => true, 'notnull' => true, 'length' => 20],
            'name'         => ['type' => 'string', 'required' => true, 'length' => 200, 'notnull' => true],
            'slug'         => ['type' => 'string', 'length' => 200, 'unique' => true],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'transactionType' => $mapper->belongsTo($entity, 'Entity\TypeTransaction', 'id_transaction_type'),
            'contry' => $mapper->belongsTo($entity, 'Entity\Contry', 'id_contry'),
            'requisitions' => $mapper->hasMany($entity, 'Entity\Requisition', 'id_transaction'),
            'price' => $mapper->hasMany($entity, 'Entity\Price', 'id_transaction')
        ];
    }
 } 