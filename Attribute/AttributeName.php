<?php

namespace Tschallacka\StormCompat\Attribute;

use Tschallacka\StormCompat\Entity\EntityType;
use Winter\Storm\Database\Model;

class AttributeName extends Model
{
    public $table = 'eav_attribute';
    public $primaryKey = 'attribute_id';

    public $belongsTo = [
        'entity_type' => EntityType::class
    ];

    public function scopeOfType($query, $type)
    {
        $query->whereHas('entity_type', function($query) use ($type) {
            $query->ofType($type);
        });
    }
}
