<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;
use Winter\Storm\Database\Model;

class AttributeInteger extends AttributeValue
{
    public $table = 'catalog_product_entity_int';
}
