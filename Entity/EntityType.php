<?php

namespace Tschallacka\StormCompat\Entity;

use Winter\Storm\Database\Model;

class EntityType extends Model
{
    public $table = 'eav_entity_type';

    public $primaryKey = 'entity_type_id';

    public $guarded = ['*'];

    public function scopeOfType($query, $type)
    {
        if(is_integer($type)) {
            $query->where($this->getKeyName(), $type);
        }
        else {
            $query->where('entity_type_code', $type);
        }
    }
}
