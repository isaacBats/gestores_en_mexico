<?php 

namespace Entity;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;
/**
 *  Model for Contry
 *  
 */

 class Price extends \Spot\Entity
 {

    protected static $table = 'prices';
    
    public static function fields(){
        return [
            'id'             => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'id_state'       => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_transaction' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'cost'           => ['type' => 'float'],
            'copy_cost'      => ['type' => 'float'],
            'copy_send'      => ['type' => 'float'],
            'create_at'      => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'state' => $mapper->belongsTo($entity, 'Entity\State', 'id_state'),
            'transaction' => $mapper->belongsTo($entity, 'Entity\Transaction', 'id_transaction'),
        ];
    }
 } 