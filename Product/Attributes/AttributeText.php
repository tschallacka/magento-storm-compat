<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;

class AttributeText extends AttributeValue
{
    public $table = 'catalog_product_entity_text';

    public $belongsTo = [
        'entity' => Product::class,
        'attribute' => AttributeName::class,
    ];
}
