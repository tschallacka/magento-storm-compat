<?php

namespace Tschallacka\StormCompat\Attribute;

use Winter\Storm\Database\Model;

class AttributeEntityType extends Model
{
    public $table = 'eav_entity_type';
    public $primaryKey = 'entity_type_id';

    public function scopeType($query, $type)
    {
        $query->where('entity_type_code', $type);
    }

    public $hasMany = [
        'attribute_values' => [
            AttributeValue::class,
            'key' => 'entity_type_id',
        ]
    ];
}
