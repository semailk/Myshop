<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopComments extends Model
{
    use HasFactory;
    protected $table = 'shop_comments';
    protected $fillable = ['user_id', 'comment'];

    public function userComment()
    {
        return $this->belongsTo(User::class);
    }
}
