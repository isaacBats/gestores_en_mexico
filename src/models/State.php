<?php 

namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;

/**
 *  Model for State
 *  
 */

 class State extends \Spot\Entity
 {

    protected static $table = 'states';
    
    public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'    => ['type' => 'string', 'length' => 100, 'notnull' => true, 'required' => true],
            'code'    => ['type' => 'string', 'length' => 8 ],
            'id_contry' => ['type' => 'integer', 'required' => true, 'unsigned' => true]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'contry' => $mapper->belongsTo($entity, 'Olive\models\Contry', 'id_contry'),
            'client' => $mapper->hasOne($entity, 'Olive\models\Client', 'id_state'),
            'settlements' => $mapper->hasMany($entity, 'Olive\models\Settlement', 'id_state'),
            'townships' => $mapper->hasMany($entity, 'Olive\models\Township', 'id_state'),
            'prices' => $mapper->hasMany($entity, 'Olive\models\Price', 'id_state'),
        ];
    }
 } 