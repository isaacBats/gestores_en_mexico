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
 *  Model for Comments
 *  
 */

 class Comment extends \Spot\Entity
 {

    protected static $table = 'comments';
    
    public static function fields(){
        return [
            'id'                => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'id_user'           => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_requisition'    => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'type'              => ['type' => 'string', 'required' => true, 'options' => [
                                        'private',
                                        'public',   
                                    ]
                                ],
            'comment'           => ['type' => 'text'],
            'created_at'        => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'user' => $mapper->belongsTo($entity, 'Olive\models\User', 'id_user'),
            'requisition' => $mapper->belongsTo($entity, 'Olive\models\Requisition', 'id_requisition'),
        ];
    }
 } 