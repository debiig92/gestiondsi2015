<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
class User extends Model implements AuthenticatableContract,CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['idtu','nombreUsuario','password'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function docente(){
        // un usuaio pertenece a un docente
       return $this->hasOne('App\Docente','user_id');
    }

    public static function getUser($id,$name){
    $results = DB::select('select id from users where idtu = :id AND nombreUsuario=:name', ['id' => $id, 'name'=>$name]);
    return $results;
    }

    public static function getUsers(){
        return DB::table('usuario')
            ->join('tipousuario', 'tipousuario.id','=','usuario.idtu')
            ->select('usuario.id','tipousuario.tipoU','usuario.nombreUsuario')->get();
    }  


   
}
