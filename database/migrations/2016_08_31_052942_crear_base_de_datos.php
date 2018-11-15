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
            $table->integer('celular')->nullable();
            $table->string('direccion')->nullable();
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
            $table->integer('id_diente')->nullable();
            
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
            $table->string('descripcion')->nullable();
            $table->string('motivo_consulta')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('tratamientos_autorizados')->nullable();
            $table->string('medico_cabecera')->nullable();
            $table->integer('telefono_medico')->nullable();
            $table->boolean('sangrado_excesivo')->default(0)->nullable();
            $table->boolean('problema_cardiaco')->default(0)->nullable();
            $table->boolean('embarazo')->default(0)->nullable();
            $table->boolean('diabetes')->default(0)->nullable();
            $table->boolean('presion_baja')->default(0)->nullable();
            $table->boolean('presion_alta')->default(0)->nullable();
            $table->boolean('cancer')->default(0)->nullable();
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
            $table->date('fecha')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
            });

            Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('id_paciente');
            $table->integer('id_odontologo');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
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
