<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;

class AttributeInteger extends AttributeValue
{
    public $table = 'catalog_product_entity_int';

    public $belongsTo = [
        'entity' => Product::class
    ];
}
