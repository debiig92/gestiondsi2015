<?php namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

protected $table= 'docente';

  protected $fillable = ['NIP','user_id','nombre', 'apellido','DUI','email', 'telefono','tipousuario_id'];

    public $timestamps = false;
public static function getDocente($id){
 return Docente::where('user_id',$id)
 ->select('docente.NIP','docente.user_id','docente.nombre','docente.apellido', 'docente.DUI', 'docente.email', 'docente.telefono', 'docente.tipousuario_id')->first(); 

    }
  public static function updateDocente($request){
  //	DB::update(
  	//	'update docente SET nombre=?, apellido=?, DUI=?,email=?,telefono=? where user_id=?', [$request->nombre, $request->apellido, $request->DUI, $request->email, $request->telefono, $request->user_id])->get();
     DB::table('docente')
      ->where('user_id', $request->user_id)
      ->update(['nombre'=>$request->nombre, 'apellido'=>$request->apellido, 'DUI'=>$request->DUI,'email'=>$request->email,'telefono'=>$request->telefono]);
      }


  public static function deleteDocente($id){
   $result=DB::delete('Delete from docente where user_id=:id', ['id'=>$id]);
    if($result==1){
   	   $result1=DB::delete('Delete from usuario where id=:id', ['id'=>$id]);
        return $result1;
    }
    else
    	return $result;

  }

  public static function getDocente1($id){
 return Docente::where('user_id',$id)->select('docente.NIP')->get(); 
 
    }

     public static function verificarNIP($nip){
   return Docente::where('NIP',$nip)->select('docente.NIP')->get(); 
   }
}
