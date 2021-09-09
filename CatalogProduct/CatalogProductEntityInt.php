<?php namespace Tschallacka\StormCompat\CatalogProduct;

use Winter\Storm\Database\Model;

/** @link https://wintercms.com/docs/database/model#defining-models
    @link https://wintercms.com/docs/database/traits
**/
class CatalogProductEntityInt extends Model
{
    public $table = 'catalog_product_entity_int';

    public $primary_key = 'id';

    public $fillable = [];

    public $guarded = ['*'];

    public $dates = [];

    public $jsonable = [];

    public $timestamps = false;

    /** @link https://wintercms.com/docs/database/relations#introduction **/
    public $hasMany = [];
    public $hasOne = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $attachOne = [];
    public $attachMany = [];
}