<?php

namespace Tschallacka\StormCompat\Attribute;

use Tschallacka\StormInheritRelations\Behavior\InheritRelations;
use Winter\Storm\Database\Model;

class AttributeValue extends Model
{
    public $primaryKey = 'value_id';
    public $timestamps = false;
    protected $guarded = ['*'];

    public $implement = [InheritRelations::class];

    protected $fillable = [
        'store_id',
        'entity_id',
        'value',
        'attribute_id'
    ];

    public function scopeWhereName($query, $name)
    {
        $query->whereHas('attribute', function($query) use ($name){
            $query->where('attribute_code', $name);
        });
    }

    public function scopeOfType($query, $type_code)
    {
        $query->whereHas('attribute', function($query) use ($type_code) {
            $query->ofType($type_code);
        });
    }



    public $belongsTo = [
        'attribute' => AttributeName::class,
    ];

}
