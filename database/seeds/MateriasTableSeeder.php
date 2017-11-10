<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09-24-15
 * Time: 06:33 PM
 */
use Illuminate\Database\Seeder;
class MateriasTableSeeder extends Seeder{
    public function run(){


        \DB::table('areaindicador')->insert(array(

            'areaindicador'  => 'AREA DE EXPERIENCIA Y DESARROLLO PERSONAL SOCIAL'

        ));

        \DB::table('areaindicador')->insert(array(

            'areaindicador'  => 'AREA DE EXPERIENCIA Y DESARROLLO DE LA EXPRESIÓN, COMUNICACIÓN Y REPRESENTACIÓN'

        ));

        \DB::table('areaindicador')->insert(array(

            'areaindicador'  => 'AREA DE EXPERIENCIA Y DESARROLLO DE LA RELACIÓN CON EL ENTORNO '

        ));






        \DB::table('asignatura')->insert(array(
            'id'=>'MAT',
            'materia'  => 'Matematica',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'LENG',
            'materia'  => 'Lenguaje',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'SOC',
            'materia'  => 'Sociales',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'CIC',
            'materia'  => 'Ciencias',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'EFS',
            'materia'  => 'Educacion Fisica',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'EDA',
            'materia'  => 'Educacion Artistica',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'INN',
            'materia'  => 'Ingles',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'CC',
            'materia'  => 'Computacion',


        ));

        \DB::table('asignatura')->insert(array(
            'id'=>'MYC',
            'materia'  => 'Moral y Civica',


        ));
    }
} 