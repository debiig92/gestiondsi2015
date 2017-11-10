<?php

use Illuminate\Database\Seeder;

class IndicadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('indicador')->insert(
            ['IDAREAIN' => 1,
                'INDICADOR'=>'Señala hasta 10 partes del cuerpo humano.',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>1
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 1,
                'INDICADOR'=>'Percibe características de su cuerpo.',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>2
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 1,
                'INDICADOR'=>'Comprende que es diferente a otras personas',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>3
            ]
        );
//AREA 2 KINDER

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Dibuja la figura humana con cabeza, tronco y extremidades',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>1
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Agarra la crayola gruesa posicionando los dedos adecuadamente',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>2
            ]
        );



        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Completa un rompecabezas de 12 a 24 piezas',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>3
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Arma figuras conocidas con piezas grandes',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>4
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Disfruta la lectura de imágenes',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>5
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Inventa historias siguiendo una secuencia lógica',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>6
            ]
        );
//kinder area 3
        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Puede mencionar por lo menos 2 caracteristicas de objetos que le son familiares',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>1
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Identifica, cuenta y comprende hasta el número 5',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>2
            ]
        );


        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Menciona correctamente la ubicación de los objetos con relación al espacio "arriba–abajo", "cerca–lejos", "adentro–afuera"',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>3
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Clasifica figuras geométricas atendiendo a una característica: forma, tamaño o color',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>4
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Establece relaciones con objetos concretos: más, menos, pocos y muchos',
                'grado_id'=>1,
                'NUMEROINDICADOR'=>5
            ]
        );

//Indicadroes de Kinder 5 area 1
        \DB::table('indicador')->insert(
            ['IDAREAIN' => 1,
                'INDICADOR'=>'Se diferencia como niño o niña y describe atributos fisicos, sin discriminación de género',
                'grado_id'=>2,
                'NUMEROINDICADOR'=>1
            ]
        );//area 2
        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Dibuja figura humana proporcionada con cabeza, tronco, extremidades',
                'grado_id'=>2,
                'NUMEROINDICADOR'=>1
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Ordena una serie de objetos que varían por tamaño, de la más pequeña a la más grande, señalando, el primero y el último',
                'grado_id'=>2,
                'NUMEROINDICADOR'=>1
            ]
        );

//Preparatoria Area 1

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 1,
                'INDICADOR'=>'Alterna brazos y piernas en forma simétrica al caminar al menos veinte pasos',
                'grado_id'=>3,
                'NUMEROINDICADOR'=>1
            ]
        );
        \DB::table('indicador')->insert(
            ['IDAREAIN' => 2,
                'INDICADOR'=>'Dibuja la figura humana con clara diferencia de sexo',
                'grado_id'=>3,
                'NUMEROINDICADOR'=>1
            ]
        );

        \DB::table('indicador')->insert(
            ['IDAREAIN' => 3,
                'INDICADOR'=>'Imita patrones con tres figuras geométricas de cuatro colores',
                'grado_id'=>3,
                'NUMEROINDICADOR'=>1
            ]
        );




    }
}
