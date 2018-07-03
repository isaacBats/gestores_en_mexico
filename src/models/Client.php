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
 *  Model for Client
 *  
 */

 class Client extends \Spot\Entity
 {

    protected static $table = 'clients';
    
    public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'first_name'    => ['type' => 'string', 'length' => 100, 'notnull' => true, 'required' => true],
            'middle_name'    => ['type' => 'string', 'length' => 100 ],
            'last_name'    => ['type' => 'string', 'length' => 100 ],
            'email'        => ['type' => 'string', 'required' => true,
                'validation' => [
                    'email',
                    'length' => [4, 255]
                ]
            ],
            'telephone'     => ['type' => 'string', 'length' => 25],
            'mobile'     => ['type' => 'string', 'length' => 25],
            'address'    => ['type' => 'string'],
            'num_inside'    => ['type' => 'smallint'],
            'num_extern'    => ['type' => 'smallint'],
            'settlement' => ['type' => 'string'],
            'township' => ['type' => 'string'],
            'zip_code' => ['type' => 'string', 'length' => 10],
            'id_state' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_contry' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'reference'    => ['type' => 'string'],
            'is_reciver'    => ['type' => 'smallint'],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'settlement' => $mapper->belongsTo($entity, 'Olive\models\Settlement', 'id_settlement'),
            'township' => $mapper->belongsTo($entity, 'Olive\models\Township', 'id_township'),
            'state' => $mapper->belongsTo($entity, 'Olive\models\State', 'id_state'),
            'contry' => $mapper->belongsTo($entity, 'Olive\models\Contry', 'id_contry'),
            'requisitions' => $mapper->hasMany($entity, 'Olive\models\Requisition', 'id_client'),
        ];
    }
 } 