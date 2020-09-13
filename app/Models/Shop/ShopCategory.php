<?php

namespace App\Models\Shop;

use App\Models\Shop\ShopProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    use HasFactory;

    protected $table = 'shop_categories';
    protected $fillable = ['parent_id','name','slug'];

    public function product()
    {
        return $this->hasMany(ShopProduct::class);
    }
}
