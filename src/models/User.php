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
 *  Model for User
 * 	
 */

 class User extends \Spot\Entity
 {

 	protected static $table = 'users';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'first_name'    => ['type' => 'string', 'length' => 100, 'notnull' => true],
            'last_name'    => ['type' => 'string', 'length' => 100 ],
            'email'        => ['type' => 'string', 'required' => true, 'unique' => true,
                'validation' => [
                    'email',
                    'length' => [4, 255]
                ]
            ],
            'password'     => ['type' => 'string', 'required' => true, 'length' => 150],
            'user_name'    => ['type' => 'string', 'unique' => true, 'length' => 50],
            'type_user'    => ['type' => 'string', 'length' => 20, 'required' => true, 'options' => [
                'admin', 
                'user'
            ]],
            'is_active'    => ['type' => 'smallint'],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()],
            'image' => ['type' => 'string', 'required' => false]
        ];
    }

    public static function events(EventEmitter $eventEmitter)
    {
        $eventEmitter->on('beforeInsert', function (Entity $entity, Mapper $mapper) {
            $entity->password = md5( $entity->password );
        });

        $eventEmitter->on('beforeUpdate', function (Entity $entity, Mapper $mapper) {
            $current_passr = $mapper->first(['id' => $entity->id])->password;
            if ($entity->password != $current_passr && !empty($entity->password)) {
                $entity->password = md5($entity->password);
            } else {
                $entity->password = $current_passr;
            }
        });
    }
    
 } 