<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-30-15
 * Time: 05:32 PM
 */
use \Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserAdminTableSeeder extends Seeder{


    public function run(){

        $faker= Faker::create();

        $id=\DB::table('usuario')->insertGetId(array(

            'idtu'=>'1',
            'nombreUsuario'  => 'deboraG',
            'password' => \Hash::make('123')
        ));

        \DB::table('docente')->insert(array(
                'NIP'  => '1234567',
                'user_id'=>$id,
                'nombre' => 'Debora Melissa',
                'apellido'=>'Guardado Reinoza',
                'DUI' => $faker->randomNumber(8)."-".$faker->randomDigit,
                'email'=>$faker->email,
                'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
                 'tipousuario_id'=>'1'

            ));


        $id=\DB::table('usuario')->insertGetId(array(

            'idtu'=>'3',
            'nombreUsuario'  => 'marlonT',
            'password' => \Hash::make('123')
        ));

        \DB::table('docente')->insert(array(
            'NIP'  => '7489789',
            'user_id'=>$id,
            'nombre' => 'Marlon Alberto',
            'apellido'=>'Torres Cabrera',
            'DUI' =>$faker->randomNumber(8)."-".$faker->randomDigit,
            'email'=>$faker->email,
            'telefono'=>$faker->randomNumber(4)."-".$faker->randomNumber(4),
            'tipousuario_id'=>'3'

        ));
    }










}
