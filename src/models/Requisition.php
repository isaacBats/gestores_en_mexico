<?php 

namespace Olive\models;

use Spot\EntityInterface as Entity;
use Spot\MapperInterface as Mapper;
use Spot\EventEmitter as EventEmitter;

/**
 *  Model for Requisition
 * 	
 */

 class Requisition extends \Spot\Entity
 {

 	protected static $table = 'requisitions';
 	
 	public static function fields(){
        return [
            'id'           => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'id_public' => ['type' => 'string', 'required' => true, 'length' => 50, 'unique' => true],
            'id_transaction' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_client' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_reciver' => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'id_price'  => ['type' => 'integer', 'required' => true, 'unsigned' => true],
            'total_cost'         => ['type' => 'float'],
            'status'    => ['type' => 'string', 'required' => true, 'options' => [
                'solicitud',
                'verificacion',
                'en_tramite',
                'no_localizado',
                'oficinas',
                'enviado',
                'detenido',
                'no_procede',
                'concluido',
            ]],
            'message'         => ['type' => 'string'],
            'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }

    public static function relations(Mapper $mapper, Entity $entity) {
        return [
            'transaction' => $mapper->belongsTo($entity, 'Olive\models\Transaction', 'id_transaction'),
            'client' => $mapper->belongsTo($entity, 'Olive\models\Client', 'id_client'),
            'reciver' => $mapper->belongsTo($entity, 'Olive\models\Client', 'id_reciver'),
            'attributes' => $mapper->hasMany($entity, 'Olive\models\DataRequisition', 'id_requisition'),
            'price' => $mapper->belongsTo($entity, 'Olive\models\Price', 'id_price'),
            'comments_private' => $mapper->hasMany($entity, 'Olive\models\Comment', 'id_requisition')
                ->where(['type' => 'private'])
                ->order(['created_at' => 'DESC']),
            'comments_public' => $mapper->hasMany($entity, 'Olive\models\Comment', 'id_requisition')
                ->where(['type' => 'public'])
                ->order(['created_at' => 'DESC']),
        ];
    }

    public static function events(EventEmitter $eventEmitter)
    {
        $eventEmitter->on('beforeInsert', function (Entity $entity, Mapper $mapper) {
            $entity->id_public = md5(uniqid());
        });
    }
 } 