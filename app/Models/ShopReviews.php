<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopReviews extends Model
{
    use HasFactory;

    protected $table = 'shop_reviews';
    protected $fillable = ['product_id','user_id','content','rating'];

    public function userReviews()
    {
        return $this->belongsTo(User::class);
    }
}
