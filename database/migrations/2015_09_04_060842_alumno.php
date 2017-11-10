<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumno extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('alumno', function(Blueprint $table)
        {
            $table->string('NIE')->unique();
            $table->integer('grado_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('encargado_id')->unsigned();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('sexo');
            $table->date('fecha_nac');
            $table->string('lugar_nac');
            $table->integer('numero');
            $table->integer('folio');
            $table->integer('tomo');
            $table->integer('libro');
            $table->string('nombrePadre')->nullable();
            $table->string('nombreMadre')->nullable();
            $table->string('DUIP')->nullable();
            $table->string('DUIM')->nullable();
            $table->boolean('estado');
            $table->timestamps();

            $table->primary('NIE');


            $table->foreign('grado_id')
                ->references('id')
                ->on('grado')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('encargado_id')
                ->references('id')
                ->on('encargado')
                ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$this->down('alumno');
	}

}
