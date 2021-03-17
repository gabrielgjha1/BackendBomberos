<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([

            'peticion_id'=>1,
            'paz_save'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'approval'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'thecnical_resolution'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('files')->insert([

            'peticion_id'=>2,
            'paz_save'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'approval'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'thecnical_resolution'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('files')->insert([

            'peticion_id'=>3,
            'paz_save'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'approval'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'thecnical_resolution'=>'https://www.isdi.education/sites/default/files/styles/noticia_basico/public/noticias/seguridad-en-compras-en-linea-3.jpg?itok=pkeLeHN6',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);


    }
}
