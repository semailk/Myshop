<?php

namespace App\Models;

use App\Models\Shop\ShopProduct\ShopProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopBasketItem extends Model
{
    use HasFactory;

    protected $table = 'shop_basket_items';
    protected $fillable = ['user_id', 'product_id'];

    public function usersBasket()
    {
        return $this->belongsTo(User::class);
    }

    public function productBasket()
    {
        return $this->belongsTo(ShopProduct::class);
    }
}
