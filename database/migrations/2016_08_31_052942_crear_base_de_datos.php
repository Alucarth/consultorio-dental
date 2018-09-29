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
        //  Schema::drop('odontologos');
        // Schema::drop('pacientes');
        // Schema::drop('tratamientos');
        //  Schema::drop('anamnesis');
        //   Schema::drop('historiales');
        //    Schema::drop('odontogramas');
        //     Schema::drop('citas');
        //     Schema::drop('pagos');
            
          Schema::create('odontologos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('especialidad');
            $table->timestamps();
            });

          Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();
            $table->string('email')->nullable();
            $table->integer('edad')->nullable();
            $table->string('sexo')->nullable();
            $table->string('pais')->nullable();
            $table->string('informacion_adicional')->nullable();
            $table->string('antecedente_enfermedad')->nullable();
            $table->integer('id_odontologo');
            $table->timestamps();
            });

            Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
            $table->integer('id_odontologo');
            $table->integer('balance');
            $table->integer('costo_tratamiento');
            $table->timestamps();
            });


            Schema::create('costo_tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tratamiento');
            $table->string('material');
            $table->integer('precion');
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
            $table->integer('id_paciente');
            $table->timestamps();
            });

            Schema::create('dientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nro_pieza');
            $table->integer('id_paciente');
            $table->string('vestibular');
            $table->string('distal');
            $table->string('oclusal');
            $table->string('palatino');
            $table->string('mesial');

            $table->timestamps();
            });

            Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
            $table->integer('id_odontologo');
            $table->date('fecha');
            $table->timestamps();
            });

            Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monto');
            $table->string('descripcion');
            $table->integer('id_tratamiento');
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
        Schema::drop('pagos');
        Schema::drop('costo_tratamientos');
        Schema::drop('dientes');
    }
}
