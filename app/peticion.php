<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peticion extends Model
{
    protected $fillable = [
        'type_edification',
        'areas_demolishions',
        'type_material',
        'electric_pole',
        'value_Demolishion',
        'number_levels',
        'type_Energy',
        'Contruccion_disable',
        'address',
        'contruction_company',
        'user_id'
    ];


    public function user(){

        return $this->BelongsTo (User::class);

    }

    public function file(){
        return $this->hasOne(file::class);
    }

}
