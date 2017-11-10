<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Encargado extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('encargado', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('DUI');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
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
		$this->down('encargado');
	}

}
