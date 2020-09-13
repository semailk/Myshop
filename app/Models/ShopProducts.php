<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProducts extends Model
{
    use HasFactory;

    protected $table = 'shop_products';
    protected $fillable = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(ShopCategories::class);
    }
}
