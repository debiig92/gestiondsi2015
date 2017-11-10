<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09-04-15
 * Time: 12:27 AM
 */
use \Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlumnoTableSeeder extends Seeder{
    public function run(){

      \DB::table('indicadoresconducta')->insert(array(

         'NOMBREINDICADOR'  => 'Se Respeta a si mismo y a los demas'

      ));

      \DB::table('indicadoresconducta')->insert(array(

         'NOMBREINDICADOR'  => 'Convive de forma armonica y solidaria'

      ));

      \DB::table('indicadoresconducta')->insert(array(

         'NOMBREINDICADOR'  => 'Toma decisiones responsablemente'

      ));


      \DB::table('indicadoresconducta')->insert(array(

               'NOMBREINDICADOR'  => 'Cumple sus deberes y ejerce correctamente sus derechos'

      ));

      \DB::table('indicadoresconducta')->insert(array(

               'NOMBREINDICADOR'  => 'Practiva valores morales y cívicos'

      ));

        \DB::table('turno')->insert(array(

           'turno'  => 'Matutino'

        ));

        \DB::table('turno')->insert(array(

            'turno'  => 'Vespertino'

        ));

        \DB::table('grado')->insert(array(

            'turno_id'=>'1',
            'grado'  => 'Kinder 4 - Matutino',
            'tipo_id' => '4'


        ));

        \DB::table('grado')->insert(array(

            'turno_id'=>'1',
            'grado'  => 'Kinder 5 - Matutino',
            'tipo_id' => '4'

        ));

        \DB::table('grado')->insert(array(

            'turno_id'=>'1',
            'grado'  => 'Preparatoria - Matutino',
            'tipo_id' => '4'

        ));



        for($i=1;$i<=3;$i++){
            \DB::table('grado')->insert(array(

                'turno_id'=>'1',
                'grado'  => $i.'°'.'- Matutino',
                'tipo_id' => '1'

            ));

        }


        for($i=4;$i<=6;$i++){
            \DB::table('grado')->insert(array(

                'turno_id'=>'1',
                'grado'  => $i.'°'.'- Matutino',
                'tipo_id' => '2'

            ));

        }


        for($i=7;$i<=9;$i++){
            \DB::table('grado')->insert(array(

                'turno_id'=>'1',
                'grado'  => $i.'°'.'- Matutino',
                'tipo_id' => '3'

            ));

        }


        \DB::table('grado')->insert(array(

            'turno_id'=>'2',
            'grado'  => 'Kinder 4 - Vespertino',
            'tipo_id' => '4'

        ));

        \DB::table('grado')->insert(array(

            'turno_id'=>'2',
            'grado'  => 'Kinder 5 - Vespertino',
            'tipo_id' => '4'

        ));

        \DB::table('grado')->insert(array(

            'turno_id'=>'2',
            'grado'  => 'Preparatoria - Vespertino',
            'tipo_id' => '4'

        ));
        for($i=1;$i<=3;$i++){
            \DB::table('grado')->insert(array(

                'turno_id'=>'2',
                'grado'  => $i.'°'.'- Vespertino',
                'tipo_id' => '1'

            ));

        }


        for($i=4;$i<=6;$i++){
            \DB::table('grado')->insert(array(

                'turno_id'=>'2',
                'grado'  => $i.'°'.'- Vespertino',
                'tipo_id' => '2'

            ));

        }


        for($i=7;$i<=9;$i++){
            \DB::table('grado')->insert(array(

                'turno_id'=>'2',
                'grado'  => $i.'°'.'- Vespertino',
                'tipo_id' => '3'

            ));

        }
    }
}
