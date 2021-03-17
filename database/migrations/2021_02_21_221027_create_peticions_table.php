<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticions', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['wait','rejected','accepted'])->default('wait');
            $table->string('type_edification');
            $table->integer('areas_demolishions');
            $table->string('type_material');
            $table->string('electric_pole');
            $table->float('value_Demolishion');
            $table->integer('number_levels');
            $table->boolean('type_Energy');
            $table->boolean('Contruccion_disable');
            $table->text('address');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('contruction_company');
            $table->timestamps();
        });


        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('paz_save');
            $table->string('approval');
            $table->string('thecnical_resolution')->nullable();
            $table->foreignId('peticion_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('peticion_id')->constrained()->onDelete('cascade');
            $table->string('img_pay')->nullable();
            $table->enum('status',['pending','payment'])->default('pending');
            $table->float('price');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticions');
        Schema::dropIfExists('files');
        Schema::dropIfExists('pays');
    }
}
