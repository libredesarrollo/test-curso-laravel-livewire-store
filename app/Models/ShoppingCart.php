<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    //public $table = "shopping_cart";

    protected $fillable = ['post_id', 'user_id', 'count', 'control'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
