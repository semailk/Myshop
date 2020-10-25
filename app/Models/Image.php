<?php

namespace App\Models;

use App\Models\Shop\ShopProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = ['user_id','src'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
          return $this->belongsToMany(ShopProduct::class, 'shop_products_images');
    }
}
