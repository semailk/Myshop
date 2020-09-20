<?php

namespace App\Models\Shop;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopProduct
 * @package App\Models\Shop
 * @property $category_id
 * @property $title
 * @property $description
 */
class ShopProduct extends Model
{
    use HasFactory;

    protected $table = 'shop_products';
    protected $fillable = ['category_id','title','description'];

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');

    }
}
