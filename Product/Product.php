<?php namespace Tschallacka\StormCompat\Product;

use Illuminate\Support\Facades\Db;
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

    /** @link https://wintercms.com/docs/database/relations#introduction **/
    public $hasMany = [];
    public $hasOne = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
