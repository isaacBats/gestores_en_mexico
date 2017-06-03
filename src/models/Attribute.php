<?php 
namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;

/**
 *  Model for Attribute
 * 	
 */

 class Attribute extends \Spot\Entity
 {

 	protected static $table = 'attributes';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'attribute'    => ['type' => 'string'],
            'display_name' => ['type' => 'string'],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }
} 