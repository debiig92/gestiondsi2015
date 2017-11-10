<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteGrado extends Model
{
    protected $table = 'docentegrado';

    protected $fillable = ['id','NIP','grado_id'];
    public $timestamps = false;

    public static function insertaDC($grado,$docente){
        \DB::table('docentegrado')->insert(
            ['NIP' => $docente,
             'grado_id'=>$grado
            ]
        );
    }
}
