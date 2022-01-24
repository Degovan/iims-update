<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cp extends Model
{
    protected $table =   "cp";

    public $timestamps = false;

    protected $fillable = [
        'nama', 'hp', 'email', 
        'id_vendor'
    ];
}
