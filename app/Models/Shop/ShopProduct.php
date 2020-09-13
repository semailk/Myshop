<?php

namespace App\Models\Shop;

use App\Models\Comment;
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

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');

    }
}
