<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItrModel extends Model
{
    //
    protected $table = 'itr';

    protected $fillable = [
        'no_itr', 'id_pr', 'tanggal_itr',
        'id_validator', 'flag', 'id_validator',
        'id_pemeriksa', 'tanggal_itr'
    ];
}
