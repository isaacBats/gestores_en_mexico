<?php 

namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;
use Spot\EventEmitter as EventEmitter;


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
            'h_copies'     => ['type' => 'smallint'],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'contry' => $mapper->belongsTo($entity, 'Olive\models\Contry', 'id_contry'),
            'requisitions' => $mapper->hasMany($entity, 'Olive\models\Requisition', 'id_transaction'),
            'transactionType' => $mapper->belongsTo($entity, 'Olive\models\TypeTransaction', 'id_transaction_type'),
            'price' => $mapper->hasMany($entity, 'Olive\models\Price', 'id_transaction'),
            'form' => $mapper->hasOne($entity, 'Olive\models\Form', 'id_transaction')
        ];
    }

    public static function events(EventEmitter $eventEmitter)
    {
        $eventEmitter->on('beforeInsert', function (Entity $entity, Mapper $mapper) {
            $entity->id_publico = md5(uniqid());
        });
    }
 } 