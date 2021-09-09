<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;

class AttributeDateTime extends AttributeValue
{
    public $table = 'catalog_product_entity_datetime';

    public $dates = ['value'];

    public $belongsTo = [
        'entity' => Product::class
    ];
}
