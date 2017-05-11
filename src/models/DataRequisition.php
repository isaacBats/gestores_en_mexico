<?php 

namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;

/**
 *  Model for Data of the Requisition
 * 	
 */

 class DataRequisition extends \Spot\Entity
 {

 	protected static $table = 'requisition_data';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'id_requisition' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_attribute' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'value' => ['type' => 'string', 'required' => true],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'requisition' => $mapper->belongsTo($entity, 'Olive\models\Requisition', 'id_requisition'),
            'attribute' => $mapper->belongsTo($entity, 'Olive\models\Attribute', 'id_attribute'),
        ];
    }
 } 