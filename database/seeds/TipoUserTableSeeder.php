<?php
use Illuminate\Database\Seeder;
class TipoUserTableSeeder extends Seeder {

    public function run(){



      \DB::table('tipousuario')->insert(array(
                'tipoU'=>'Director'

       ));
              \DB::table('tipousuario')->insert(array(
            'tipoU'=>'Docente Basica'

        ));

        \DB::table('tipousuario')->insert(array(
            'tipoU'=>'Docente Parvularia'

        ));

        \DB::table('tipousuario')->insert(array(
            'tipoU'=>'Sub-Director'

        ));

      
        \DB::table('tipociclo')->insert(array(
            'tipoD'=>'Primer Ciclo'

        ));

        \DB::table('tipociclo')->insert(array(
            'tipoD'=>'Segundo Ciclo'

        ));

        \DB::table('tipociclo')->insert(array(
            'tipoD'=>'Tercer Ciclo'

        ));

        \DB::table('tipociclo')->insert(array(
            'tipoD'=>'Parvularia'

        ));



    }




}
