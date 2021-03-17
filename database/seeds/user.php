<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name'=>'Gabriel',
            'email'=>'gabrielhernandezgjha1@gmail.com',
            'cedula'=>'8-930-189',
            'phone'=>'6765-0958',
            'password'=>Hash::make('123456789'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);


        DB::table('users')->insert([

            'name'=>'Gabriel',
            'email'=>'gabrielhernandezgjha2@gmail.com',
            'cedula'=>'8-930-1959',
            'phone'=>'6065-0959',
            'role'=>'admin_role',
            'password'=>Hash::make('123456789'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

    }
}
