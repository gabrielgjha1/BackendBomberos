<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $fillable = [
        'paz_save', 'approval', 'thecnical_resolution','peticion_id'
    ];

    public function peticion (){

        return $this->belongsTo(peticion::class);

    }

}
