<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGeneral extends Model
{
    use HasFactory;

    protected $fillable = ['subject','type','message'];

    public function person(){
        return $this->hasOne(ContactPerson::class);
    }
}
