<?php

namespace App\Models\Shop\ShopProduct;

use App\Models\ShopCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;

    protected $table = 'shop_products';
    protected $fillable = ['title', 'description'];

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }
}
