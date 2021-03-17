<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay extends Model
{
    protected $fillable = [
        'user_id',
        'peticion_id',
        'price',
        'img_pay',
        'status_payment'
    ];
}
