@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            <h2>Exito!</h2>
            <hr class="colorgraph">
            <!--Aqui ponen lo que quieran -->
            <table>
              <tr>
                <th><img src="{{ asset('images/exito.png') }}" style="width:120px;"/></th>
                <th><h4>&nbsp;&nbsp;{{$mensaje}}</h4><th>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
</script>
@stop
