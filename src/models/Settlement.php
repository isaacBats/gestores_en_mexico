<?php 

namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;

/**
 *  Model for Settlement
 *  
 */

 class Settlement extends \Spot\Entity
 {

    protected static $table = 'settlemets';
    
    public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'zipcode'    => ['type' => 'string', 'length' => 10, 'notnull' => true, 'required' => true],
            'name'    => ['type' => 'string', 'length' => 100, 'notnull' => true, 'required' => true],
            'id_township' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_state' => ['type' => 'integer', 'required' => true, 'unsigned' => true]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'state' => $mapper->belongsTo($entity, 'Olive\models\State', 'id_state'),
            'township' => $mapper->belongsTo($entity, 'Olive\models\Township', 'id_township'),
            'client' => $mapper->hasOne($entity, 'Olive\models\Client', 'id_settlement'),
        ];
    }
 } 