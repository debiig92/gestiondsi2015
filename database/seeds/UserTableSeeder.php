<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-30-15
 * Time: 03:16 PM
 */
use \Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserTableSeeder extends Seeder{



    public function run(){

        $faker= Faker::create();

//Docentes basica
        for($i=0;$i<9;$i++){


          $id=  \DB::table('usuario')->insertGetId(array(
                'idtu'=>'2',
                'nombreUsuario'=>$faker->userName,
                'password' => \Hash::make('123')
            ));


          \DB::table('docente')->insert(array(
              'NIP'  => $i+1008000,
              'user_id'  => $id,
              'nombre' => $faker->firstName." ".$faker->firstName,
              'apellido'=>$faker->lastName." ".$faker->lastName,
              'DUI' => $faker->randomNumber(8)."-".$faker->randomDigit,
              'email'=>$faker->email,
              'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
              'tipousuario_id'=>'2'

            ));

        }

//docentes parvularia
                for($i=0;$i<6;$i++){


                  $id=  \DB::table('usuario')->insertGetId(array(
                        'idtu'=>'3',
                        'nombreUsuario'=>$faker->userName,
                        'password' => \Hash::make('123')
                    ));


                  \DB::table('docente')->insert(array(
                      'NIP'  => $i+2208000,
                      'user_id'  => $id,
                      'nombre' => $faker->firstName." ".$faker->firstName,
                      'apellido'=>$faker->lastName." ".$faker->lastName,
                      'DUI' => $faker->randomNumber(8)."-".$faker->randomDigit,
                      'email'=>$faker->email,
                      'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
                      'tipousuario_id'=>'3'

                    ));

                }

// Subdirector
                $id=  \DB::table('usuario')->insertGetId(array(
                      'idtu'=>'4',
                      'nombreUsuario'=>$faker->userName,
                      'password' => \Hash::make('123')
                  ));


                \DB::table('docente')->insert(array(
                    'NIP'  => $i+2208990,
                    'user_id'  => $id,
                    'nombre' => $faker->firstName." ".$faker->firstName,
                    'apellido'=>$faker->lastName." ".$faker->lastName,
                    'DUI' => $faker->randomNumber(8)."-".$faker->randomDigit,
                    'email'=>$faker->email,
                    'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
                    'tipousuario_id'=>'4'

                  ));
/*
// Ingles

$id=  \DB::table('usuario')->insertGetId(array(
      'idtu'=>'5',
      'nombreUsuario'=>$faker->userName,
      'password' => \Hash::make('123')
  ));


\DB::table('docente')->insert(array(
    'NIP'  => $i+2208660,
    'user_id'  => $id,
    'nombre' => $faker->firstName." ".$faker->firstName,
    'apellido'=>$faker->lastName." ".$faker->lastName,
    'DUI' => $faker->randomNumber(8)."-".$faker->randomDigit,
    'email'=>$faker->email,
    'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
    'tipousuario_id'=>'5'

  ));

//computacion

  $id=  \DB::table('usuario')->insertGetId(array(
        'idtu'=>'6',
        'nombreUsuario'=>$faker->userName,
        'password' => \Hash::make('123')
    ));


  \DB::table('docente')->insert(array(
      'NIP'  => $i+2245000,
      'user_id'  => $id,
      'nombre' => $faker->firstName." ".$faker->firstName,
      'apellido'=>$faker->lastName." ".$faker->lastName,
      'DUI' => $faker->randomNumber(8)."-".$faker->randomDigit,
      'email'=>$faker->email,
      'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
      'tipousuario_id'=>'6'

    ));*/

//Alumnos por grado solo 15
        $u=1;
        while($u<=24){
                  for($i=0;$i<15;$i++){
                    \DB::table('alumno')->insert(array(
                        'NIE'  => $i+$faker->randomNumber(7),
                        'grado_id' =>$u,

                        'nombre' => $faker->firstName." ".$faker->firstName,
                        'apellidos'=>$faker->lastName." ".$faker->lastName,
                        'direccion' => $faker->address,
                        'sexo'=>'F',
                        'fecha_nac'=>$faker->date($format = 'Y-m-d'),
                        'lugar_nac'=>$faker->city,
                        'numero'=>$faker->randomDigitNotNull,
                        'tomo'=>$faker->randomDigitNotNull,
                        'folio'=>$faker->randomDigitNotNull,
                        'libro'=>$faker->randomDigitNotNull,
                        'nombrePadre'=>$faker->firstNameMale." ".$faker->firstNameMale,
                        'nombreMadre'=>$faker->firstNameFemale." ".$faker->firstNameFemale,
                        'DUIP'=> $faker->randomNumber(8)."-".$faker->randomDigit,
                        'DUIM'=> $faker->randomNumber(8)."-".$faker->randomDigit,
                        'estado'=>'1',
                        'nombreE'=> $faker->firstName." ".$faker->firstName,
                        'telefonoE'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
                        'direccionE'=>$faker->address,
                        'DUIE'=>$faker->randomNumber(8)."-".$faker->randomDigit

                    ));
                  }

              $u++;

        }




    }








}
