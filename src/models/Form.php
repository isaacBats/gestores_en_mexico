<?php 

namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;
use Spot\EventEmitter as EventEmitter;


/**
 *  Model for Transaction
 *  
 */

 class Form extends \Spot\Entity
 {

    protected static $table = 'forms';
    
    public static function fields(){
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'title'         => ['type' => 'string', 'required' => true, 'length' => 200, 'notnull' => true],
            'description'   => ['type' => 'text', 'required' => true],
            'createdAt'     => ['type' => 'datetime', 'value' => new \DateTime()],
            'updatedAt'     => ['type' => 'datetime', 'value' => new \DateTime()],
            'id_transaction' => ['type' => 'integer', 'required' => true, 'unsigned' => true]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'transactions' => $mapper->belongsTo($entity, 'Olive\models\Transaction', 'id_transaction')
        ];
    }

    public static function events(EventEmitter $eventEmitter)
    {
        $eventEmitter->on('beforeInsert', function (Entity $entity, Mapper $mapper) {
            $entity->createdAt = new \DateTime();
        });

        $eventEmitter->on('beforeUpdate', function (Entity $entity, Mapper $mapper) {
            $entity->updatedAt = new \DateTime();
        });
    }
 } 