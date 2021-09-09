<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;

class AttributeVarchar extends AttributeValue
{
    public $table = 'catalog_product_entity_varchar';

    public $belongsTo = [
        'entity' => Product::class
    ];
}
