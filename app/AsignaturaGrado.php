<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaGrado extends Model
{
    //
    protected $table = 'asignatura_has_docente';
    protected $primaryKey='id';
    protected $fillable = ['docente_NIP','ASIGNATURA_idASIGNATURA','grado_id','id','estado'];
    public $timestamps = false;
}
