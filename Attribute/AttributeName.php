<?php

namespace Tschallacka\StormCompat\Attribute;

use Winter\Storm\Database\Model;

class AttributeName extends Model
{
    public $table = 'eav_attribute';
    public $primaryKey = 'attribute_id';

}
