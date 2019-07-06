<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mapa extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        /*
         * Tabla que contiene la informacion de las posiciones en el Mapa
         * Campos
         * id: define el id de la celda del mapa
         * owen_id: define nombre del usuario que es dueño de la celda del mapa
         * terrain_id: define el tipo de terreno que contiene la celda
        */
        Schema::create('mapa', function (Blueprint $table) {
            $table->increments('id')
                ->unique();
            $table->integer('owen_id');
            $table->integer('terrain_id');
        });

        /*
         * Tabla que contiene la informacion de los terrenos
         * Campos
         * id: define el id del tipo de terreno
         * name: nombre del terreno
        */
        Schema::create('terrain', function (Blueprint $table){
            $table->increments('id')
                ->unique();
            $table->string('name')
                ->unique();
        });

        /*
         * Tabla que contiene la informacion de los atributos que modifica el terreno
         * Campos
         * id: define el id del atributo
         * name: nombre del atributo
         * value: modificador
        */
        Schema::create('attribute', function (Blueprint $table) {
            $table->increments('id')
                ->unique();
            $table->string('name')
                ->unique();
            $table->float('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('mapa');
    }
}
