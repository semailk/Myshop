<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopReviews extends Model
{
    use HasFactory;

    protected $table = 'shop_reviews';
    protected $fillable = ['user_id','reviews'];

    public function userReviews()
    {
        return $this->belongsTo(User::class);
    }
}
