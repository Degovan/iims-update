<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestProduct extends Model
{
    protected $fillable = [
        'pr_id', 'product_id', 'qty',
        'vendor_id', 'note', 'is_checked'
    ];
}
