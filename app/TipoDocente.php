<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocente extends Model {

    protected $table = 'tipodocente';
    public function docente(){
        // un docente pertenece a un tipo docente
        return $this->hasOne('App\Docente','tipo_id');

    }

}
