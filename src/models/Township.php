<?php 
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Olive\models;

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
            'state' => $mapper->belongsTo($entity, 'Olive\models\State', 'id_state'),
            'client' => $mapper->hasOne($entity, 'Olive\models\Client', 'id_township'),
            'settlemets' => $mapper->hasMany($entity, 'Olive\models\Settlement', 'id_township'),
        ];
    }
 } 