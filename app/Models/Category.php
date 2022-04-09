<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'body'];

    public function getImageUrl()
    {
        if ($this->image == null)
            return "broken-img.png";
        return URL::asset("images/category" . $this->image);
    }
}
