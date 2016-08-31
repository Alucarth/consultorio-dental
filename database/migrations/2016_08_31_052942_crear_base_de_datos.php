<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearBaseDeDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('odontologos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('especialidad');
            $table->timestamps();
            });

          Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('informacion_adicional');
            $table->integer('id_odontologo');
            $table->timestamps();
            });

          Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
            $table->integer('id_odontologo');
         
            $table->timestamps();
            });

           Schema::create('anamnesis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
        
            $table->timestamps();
            });

            Schema::create('historiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
         
            $table->timestamps();
            });

            Schema::create('odontogramas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
         
            $table->timestamps();
            });

            Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
            $table->integer('id_odontologo');
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
        //
        Schema::drop('odontologos');
        Schema::drop('pacientes');
        Schema::drop('tratamientos');
         Schema::drop('anamnesis');
          Schema::drop('historiales');
           Schema::drop('odontogramas');
            Schema::drop('citas');
    }
}
