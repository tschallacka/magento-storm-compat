<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;

class ProductAttribute extends AttributeValue
{
    public $belongsTo = [
        'entity' => Product::class,
    ];
}
