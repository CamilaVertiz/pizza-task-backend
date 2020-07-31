<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'email',
        'firstname',
        'lastname',
        'address',
        'city',
        'state',
        'zip',
        'total_products',
        'total',
    ];
}