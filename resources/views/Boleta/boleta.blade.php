@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
  <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
          <div class="panel-body">
            @include('alerts.errors')
            <h2>Boleta de notas</h2>
            <hr class="colorgraph">
            <!--Aqui ponen lo que quieran -->
            {!!Form::open(['route'=>'boletas.store','method'=>'POST']) !!}
            {!! Form::hidden('accion', 1) !!}
            <table>
              <tr>
                <td style="width:100px"><label class="form-label">Grados</label></td>
                <td style="width:240px"><select class="form-control" id="grado_act" name="grado_act" required
                oninvalid="setCustomValidity('No tiene grados asignado aún')"
                oninput="validarMensaje(this);">
                @foreach ($grados as $grado)
                <option value="{{$grado->id}}" >{{$grado->grado}}</option>
                @endforeach
                </select>
                <script>
                function validarMensaje(elementoInput) {

                     if(elementoInput.validity.patternMismatch){
                        elementoInput.setCustomValidity('');
                    }
                    else {
                        elementoInput.setCustomValidity('');
                    }

                }

                </script>
</td>
                <td><input type="submit" value="Listar Alumnos" class="btn btn-primary" style="margin-left:50px;background: #23282E;"></td>
              </tr>
            </table>

             {!!Form::close() !!}
             @include('Boleta.busquedas')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
