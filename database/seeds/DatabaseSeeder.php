<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('TipoUserTableSeeder');
        $this->call('AlumnoTableSeeder');
		    $this->call('UserTableSeeder');
        $this->call('UserAdminTableSeeder');
        $this->call('MateriasTableSeeder');
      //  $this->call('IndicadoresTableSeeder');
        $this->call('AsignaturaCicloTableSeeder');


	}

}
