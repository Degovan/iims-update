<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';

    protected $fillable = [
        'greeting', 'content', 'footer',
        'copyright', 'logo', 'background'
    ];
}
