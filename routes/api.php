<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::get('validateToken', 'AuthController@ValidateToken');

        //peticiones
        Route::get('request','PeticionController@index')->name('peticion.index');
        Route::post('request','PeticionController@store')->name('peticion.store');
        Route::put('request/{peticion}','PeticionController@update')->name('peticion.update');
        Route::get('request/show','PeticionController@show')->name('peticion.show');
        Route::get('showOne/{peticion}','PeticionController@showOne')->name('peticion.show');
        //
        Route::put('request/{peticion}/{status}','PeticionController@ConfirmPeticion')->name('peticion.confirm');

        Route::delete('request/deleteOne/{peticion}','PeticionController@destroy')->name('peticion.delete');


        //pagos
        Route::get('payment','PayController@index')->name('payment.index');
        Route::post('payment/{pay}','PayController@update')->name('payment.update');
        // Route::put('pago/{pay}','PayController@ActuliazarPago')->name('payment.update');
        Route::get('payment/{pay}','PayController@show')->name('payment.show');

        Route::get('findAllPayUser','PayController@findAllPayUser')->name('payment.allUser');

    });
});


