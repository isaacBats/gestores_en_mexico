<?php 

namespace Entity;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;

/**
 *  Model for Township
 *  
 */

 class Township extends \Spot\Entity
 {

    protected static $table = 'townships';
    
    public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'    => ['type' => 'string', 'length' => 100, 'notnull' => true, 'required' => true],
            'id_state' => ['type' => 'integer', 'required' => true, 'unsigned' => true]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'state' => $mapper->belongsTo($entity, 'Entity\State', 'id_state'),
            'client' => $mapper->hasOne($entity, 'Entity\Client', 'id_township'),
            'settlemets' => $mapper->hasMany($entity, 'Entity\Settlement', 'id_township'),
        ];
    }
 } 