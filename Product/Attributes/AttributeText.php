<?php

namespace Tschallacka\StormCompat\Product\Attributes;

use Tschallacka\StormCompat\Attribute\AttributeValue;
use Tschallacka\StormCompat\Product\Product;
use Winter\Storm\Database\Model;

class AttributeText extends ProductAttribute
{
    public $table = 'catalog_product_entity_text';
}
