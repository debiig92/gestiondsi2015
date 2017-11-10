<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function(Blueprint $table)
        {
            $table->string('NIP')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('DUI');
            $table->string('email');
            $table->string('telefono');

            $table->timestamps();

           $table->primary('NIP');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('docentes');
    }

}



