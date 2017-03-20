<?php 

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
            'fist_name'    => ['type' => 'string', 'length' => 100, 'notnull' => true, 'required' => true],
            'middle_name'    => ['type' => 'string', 'length' => 100 ],
            'last_name'    => ['type' => 'string', 'length' => 100 ],
            'email'        => ['type' => 'string', 'required' => true, 'unique' => true,
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
            'id_settlement' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_township' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_state' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_contry' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'reference'    => ['type' => 'string'],
            'is_reciver'    => ['type' => 'string'],
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