<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategories extends Model
{
    use HasFactory;

    protected $table = 'shop_categories';
    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany(ShopProducts::class);
    }
}
