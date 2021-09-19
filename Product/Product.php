<?php namespace Tschallacka\StormCompat\Product;

use Illuminate\Support\Facades\Db;
use Tschallacka\StormCompat\Attribute\AttributeState;
use Tschallacka\StormCompat\Product\Attributes\AttributeDateTime;
use Tschallacka\StormCompat\Product\Attributes\AttributeDecimal;
use Tschallacka\StormCompat\Product\Attributes\AttributeInteger;
use Tschallacka\StormCompat\Product\Attributes\AttributeText;
use Tschallacka\StormCompat\Product\Attributes\AttributeVarchar;
use Winter\Storm\Database\Model;

/** @link https://wintercms.com/docs/database/model#defining-models
    @link https://wintercms.com/docs/database/traits
**/
class Product extends Model
{
    public $table = 'catalog_product_entity';

    public $primaryKey = 'entity_id';

    public $fillable = [
        'attribute_set_id',
        'type_id',
        'sku',
        'has_options',
        'required_options',
    ];

    public $guarded = ['*'];

    public $dates = [];

    public $jsonable = [];

    public $timestamps = true;

    /**
     * @var AttributeState[] $attributes_cache
     */
    public $attributes_cache = [];

    public function scopeWithAttributes($query)
    {
        $limit_to_products = function($query) {
            $query->ofType(\Magento\Catalog\Model\Product::ENTITY);
        };
        $query->with([
            'entity_varchar.attribute' => $limit_to_products,
            'entity_text.attribute' => $limit_to_products,
            'entity_integer.attribute' => $limit_to_products,
            'entity_decimal.attribute' => $limit_to_products,
            'entity_datetime.attribute' => $limit_to_products
        ]);
    }
    public function beforeSave() {
        xdebug_break();
    }
    public function afterFetch()
    {
        xdebug_break();
        $entities = array_merge($this->entity_varchar, $this->entity_text, $this->entity_integer, $this->entity_decimal, $this->entity_datetime);
        foreach($entities as $entity) {
            $state = new AttributeState($entity);
            $this->attributes_cache[$state->getName()] = $state;
        }
    }

    public function setAttribute($key, $value)
    {
        if(isset($this->attributes_cache[$key])) {
            $this->attributes_cache[$key]->setValue($value);
            return $this;
        }
        return parent::setAttribute($key, $value);
    }

    public function getAttributeValue($key)
    {
        if(isset($this->attributes_cache[$key])) {
            return $this->attributes_cache[$key]->getValue();
        }

        return parent::getAttributeValue($key);
    }

    /** @link https://wintercms.com/docs/database/relations#introduction **/
    public $hasMany = [
        'entity_varchar' => [
            AttributeVarchar::class,
            'key' => 'entity_id'
        ],
        'entity_text' => [
            AttributeText::class,
            'key' => 'entity_id'
        ],
        'entity_integer' => [
            AttributeInteger::class,
            'key' => 'entity_id'
        ],
        'entity_decimal' => [
            AttributeDecimal::class,
            'key' => 'entity_id'
        ],
        'entity_datetime' => [
            AttributeDateTime::class,
            'key' => 'entity_id'
        ],
    ];

    public $hasOne = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
