<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grado extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('grado', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('turno_id')->unsigned();
            $table->string('grado');
            $table->integer('tipo_id')->unsigned();
            $table->timestamps();

            $table->foreign('turno_id')
                ->references('id')
                ->on('turno')
                ->onDelete('cascade');

            $table->foreign('tipo_id')
                ->references('id')
                ->on('tipociclo')
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
        $this->down('grado');
	}

}
