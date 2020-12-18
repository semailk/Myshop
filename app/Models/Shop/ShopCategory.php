<?php

namespace App\Models\Shop;

use App\Models\Shop\ShopProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopCategory
 * @package App\Models\Shop
 * @property   $parent_id
 * @property   $name
 * @property   $slug
 */
class ShopCategory extends Model
{
    use HasFactory;

    protected $table = 'shop_categories';
    protected $fillable = ['parent_id','name','slug'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(ShopProduct::class);
    }

    public function children()
    {
        return $this->hasMany(ShopCategory::class,'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ShopCategory::class,'parent_id');
    }

}
