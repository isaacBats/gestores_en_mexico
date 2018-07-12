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
use Spot\EventEmitter as EventEmitter;

/**
 *  Model for Attribute
 * 	
 */

 class CmsOption extends \Spot\Entity
 {

 	protected static $table = 'cms_options';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'         => ['type' => 'string'],
            'value'        => ['type' => 'text'],
            'date_created' => ['type' => 'datetime'],
            'date_updated' => ['type' => 'datetime']
        ];
    }

    public static function events(EventEmitter $eventEmitter)
    {
        $eventEmitter->on('beforeInsert', function (Entity $entity, Mapper $mapper) {
            $entity->date_created = new \DateTime();
        });

        $eventEmitter->on('beforeUpdate', function (Entity $entity, Mapper $mapper) {
            $entity->date_updated = new \DateTime();
        });
    }
} 