<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;

class AttributeDecimal extends AttributeValue
{
    public $table = 'catalog_product_entity_datetime';

    public $belongsTo = [
        'entity' => Product::class
    ];
}
