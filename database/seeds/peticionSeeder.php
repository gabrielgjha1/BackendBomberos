<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class peticionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peticions')->insert([

            'type_edification'=>'identificacion 1',
            'areas_demolishions'=>1,
            'type_material'=>'concreto',
            'electric_pole'=>'Esquina 1',
            'value_Demolishion'=>23.2,
            'number_levels'=>15,
            'type_Energy'=>true,
            'Contruccion_disable'=>false,
            'address'=>'panama',
            'user_id'=>1,
            'contruction_company'=>true,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);


        DB::table('peticions')->insert([

            'type_edification'=>'identificacion 2',
            'areas_demolishions'=>1,
            'type_material'=>'concreto',
            'electric_pole'=>'Esquina 1',
            'value_Demolishion'=>23.2,
            'number_levels'=>15,
            'type_Energy'=>true,
            'Contruccion_disable'=>false,
            'address'=>'panama',
            'user_id'=>1,
            'contruction_company'=>true,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('peticions')->insert([

            'type_edification'=>'identificacion 3',
            'areas_demolishions'=>1,
            'type_material'=>'concreto',
            'electric_pole'=>'Esquina 1',
            'value_Demolishion'=>23.2,
            'number_levels'=>15,
            'type_Energy'=>true,
            'Contruccion_disable'=>false,
            'address'=>'panama',
            'user_id'=>2,
            'contruction_company'=>true,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

    }
}
