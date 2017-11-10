<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //['idActividad','idTipoActividad','idAsignatura','ponderacion','idActividad'];
        Schema::create('actividad', function(Blueprint $table)
        {
            $table->integer('idActividad');
            $table->integer('idTipoActividad');
            $table->integer('idAsignatura');
            $table->decimal('ponderacion', 10, 2);
            $table->integer('idActividad');
            $table->primary('idActividad');
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
        $this->down('actividad');
    }
}
