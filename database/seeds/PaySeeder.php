<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pays')->insert([

            'user_id'=>1,
            'peticion_id'=>1,
            'img_pay'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'price'=>250,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('pays')->insert([

            'user_id'=>1,
            'peticion_id'=>2,
            'img_pay'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'price'=>250,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('pays')->insert([

            'user_id'=>2,
            'peticion_id'=>3,
            'img_pay'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'price'=>250,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

    }
}
