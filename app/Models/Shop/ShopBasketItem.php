<?php

namespace App\Models\Shop;

use App\Models\Shop\ShopProduct;
use App\Models\User;
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
