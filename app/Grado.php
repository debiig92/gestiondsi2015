<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model {

    protected $table = 'grado';
    protected $primaryKey= 'id';
    protected $fillable = ['tipo_id','grado_id','turno_id','orientador'];
    public function scopeGrado($query,$grado){
        //  dd("scope: ".$grado);
        $query->where('grado',$grado);
    }

    public function scopeid($query){
        //  dd("scope: ".$grado);
        $query->select('id');
    }

    public static function filtrosGrado($grado)
    {
        return Grado::id()->grado($grado)->get();
    }
}
