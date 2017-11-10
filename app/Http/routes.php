<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('log','LogController');
Route::get('/','VistasController@index');
Route::get('homeD','VistasController@director');
Route::get('homeDB','VistasController@docenteB');
Route::get('homeDP','VistasController@docenteP');
Route::get('logout','LogController@logout');
Route::resource('consultar','BusquedaAlumnosController');
Route::resource('egresar','DesinscribirAlumnosController');
Route::resource('alumno','AlumnosController');
Route::resource('areaIndicador','areaIndicadorController');
//Route::resource('crearActividad','CrearActividadController');
Route::get('reporteasistencia','RegistrarAsistenciaController@show');
Route::resource('registrarAsistencia','RegistrarAsistenciaController');

Route::resource('usuario','UsuariosController');
Route::resource('password','PasswordController');


Route::resource('actualizarAlumno','ActualizarAlumnoController');
Route::resource('promo','PromocionController');
Route::resource('registrar','RegistroNotasController');
Route::resource('asignatura','AsignaturaController');
Route::get('actividad/crearSub','ActividadController@crearSubActividades');
Route::resource('actividad','ActividadController');
Route::resource('subactividad','SubActividadController');
Route::resource('actualizarnotas','ActualizarNotasController');



Route::resource('registrarIndicador','RegristrarIndicadorController');
Route::post('registrar_indicador',['as' => 'indicador.grado', 'uses' => 'RegristrarIndicadorController@registrarIndicador']);
Route::post('registrar_indicador2',['as' => 'indicador.grado2', 'uses' => 'RegristrarIndicadorController@registrarIndicador2']);
Route::get('registrar_indicador/{Grado?}',['as' => 'listadoKP', 'uses' => 'RegristrarIndicadorController@Listado']);
Route::get('registrar_indicador/{title?}/{nie?}',['as' => 'alumno.cuadro', 'uses' => 'RegristrarIndicadorController@cuadros']);
Route::get('registrarIndicadorLibreta','RegristrarIndicadorController@indexGenerarL');
Route::get('registrarIndicadorLibreta/{NIE?}',['as' => 'reg.libreta', 'uses' => 'RegristrarIndicadorController@generarL']);



Route::resource('generarReportes','ReportesController');
Route::resource('conducta','ConductaController');
Route::resource('asistencia', 'AsistenciaController@index');
Route::resource('calendario', 'CalendarioController');
Route::resource('indicador', 'IndicadorController');
Route::resource('crearindicador', 'CrearIndicadorController');
Route::resource('asignarparvularia', 'AsignarParvulariaController');
//------------------------------------------------------------------
Route::resource('registrar_grado','RegistroGradosController');
Route::resource('consultarOrientador','ConsultarAsignacionesController');
Route::resource('consultarConducta','ConsultarConductaController');
Route::resource('eliminarConducta','EliminarConductaController');
//----------------------------------------------------------------------------------------------------------------------
//PDF's
Route::get('pdfPrueba', 'PdfController@invoice');

Route::resource('modificarAsignatura','ModificarAsignatura');
Route::resource('modificarOrientador','ModificarOrientadoresController');

Route::resource('registrarConducta','RegistrarCoductaController');

//====================================================================================================================
Route::resource('escolar','EscolarController');
Route::Resource('updateActividad','updateActividadController');
Route::resource('procesar','ProcesarNotasController');
//================================================================================================================
//pdfinasistencias
Route::get('boleta/{grado_id?}/{nie?}','BoletaController@generar');
Route::get('list/{grado_id?}','BoletaController@generarPorGrado');
Route::get('final/{grado_id?}','BoletaController@generarCuadroFinal');
Route::resource('boletas','BoletaController');
Route::resource('act','ActualizarActividadController');
Route::resource('updateG','updatePorGradoController');
Route::resource('promover','PromoverController');
Route::get('listar','BoletaController@Listar');
Route::get('cuadroF','BoletaController@cuadroFinal');
//-------------------------------------------------------------------------------------------------------------------
//solo para llenar base de datos
Route::get('llenarActividades','LlenarBDController@llevarActividades');
Route::get('llenarSub','LlenarBDController@llenarSubactividad');
Route::get('llenarnotas','LlenarBDController@llenarNotas');
