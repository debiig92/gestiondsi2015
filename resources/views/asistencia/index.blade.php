
@extends('layouts.menu')



@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:900px;">
                    <div class="panel-body">

              <h1>Consulta de Asistencia </h1>
                <table class="table">
                 <thead>
                     <th>ID</th>
                      <th>Alumno</th>
                      <th>NIE</th>
                       <th>Dias Lectivos</th>
                </thead>

                <tbody>

<tr>
  <td>1</td>
  <td>Carla Marroquin</td>
  <td>123456</td>
  <td>dias</td>

  </tr>

</tbody>
</table>


                    </div>
                    <a href="{!! URL::to('/asistencia/create') !!}" style="color:#2E353D; font-size:16px">Registrar Asistencia</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@stop
