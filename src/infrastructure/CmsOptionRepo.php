<?php
/*
 * This file is part of AtaqueVisual.
 *
 * (c) Isaac Daniel Batista <@codeisaac>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Olive\infrastructure;

class CmsOptionRepo extends BaseRepository
{
    public function getModel ()
    {
        return 'CmsOption';
    }
    
    public function createOrUpdate ($entity) {
        if ($update = $this->mapper->where(['name' => $entity->name])->first()) {
            $update->value = $entity->value;
            return $this->update($update);
        }

        return $this->save($entity);
    }

}