<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    use HasFactory;
    
    protected $fillable = ['contact_general_id','choices','other','identification','email','extra'];
}
