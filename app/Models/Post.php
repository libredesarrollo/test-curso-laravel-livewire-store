<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['title', 'slug','date','image','content','description','posted','type', 'category_id'];

    public $timestamps=false;

    protected $casts = [
        'date'  => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrl()
    {
        if ($this->image == null)
            return URL::asset("images/image.jpg" );
        return URL::asset("images/post/" . $this->image);
    }

}
