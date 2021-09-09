<?php

namespace Tschallacka\StormCompat\Attribute;

use Winter\Storm\Database\Model;

abstract class AttributeValue extends Model
{
    public $table = 'catalog_product_entity_varchar';
    public $primaryKey = 'value_id';
    public $timestamps = false;
    protected $guarded = ['*'];

    protected $fillable = [
        'store_id',
        'entity_id',
        'value',
        'attribute_id'
    ];

    public function scopeName($query, $name)
    {
        $query->whereHas('attribute', function($query) use ($name){
            $query->where('attribute_code', $name);
        });
    }

    public function scopeType($query, $type_code)
    {
        $query->whereHas('attribute', function($query) use ($type_code) {
            $query->type($type_code);
        });
    }

    public $belongsTo = [
        'attribute' => AttributeName::class,
    ];
}
