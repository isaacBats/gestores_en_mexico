<?php 

namespace Entity;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;
/**
 *  Model for Contry
 *  
 */

 class Contry extends \Spot\Entity
 {

    protected static $table = 'contries';
    
    public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'    => ['type' => 'string', 'length' => 100, 'notnull' => true, 'required' => true],
            'code'    => ['type' => 'string', 'length' => 5 ]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'client' => $mapper->hasOne($entity, 'Entity\Client', 'id_contry'),
            'states' => $mapper->hasMany($entity, 'Entity\State', 'id_contry'),
            'transactions' => $mapper->hasMany($entity, 'Entity\Transaction', 'id_contry'),
        ];
    }
 } 