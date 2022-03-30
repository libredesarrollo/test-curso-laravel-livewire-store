<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $table = "contact_persons";

    protected $fillable = ['name', 'contact_general_id', 'surname', 'extra', 'email'];

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class, 'contact_general_id');
    }
}
