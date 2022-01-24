<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $table = 'purchase_request';

    protected $fillable = [
        'no_pr', 'note', 'tanggal',
        'total', 'status', 'created_by',
        'acc_by'
    ];
}
