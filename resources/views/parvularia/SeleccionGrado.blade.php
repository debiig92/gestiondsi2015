@extends('layouts.menu')
@section('content')

<div class="container" id="container-inscripcion-alumno">

    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
    <div class="row" id="row-inscripcion-alumno">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
    <div class="panel-body">

    <h2>Registro de Indicadores</h2>
             <hr class="colorgraph" id="linea-Superior">
    <div style="margin-top:40px;">
        <h4>Seleccione el grado: </h4><br>

    {!!Form::open(array('route' => 'indicador.grado'))!!}
    <table>
    <tr>
    <td><i class="fa fa-users fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;
      <select class="form-control" id="grado_act" name="grado_act">
         @foreach ($grados as $grado)
         <option value="{{$grado->id}}">{{$grado->grado}}</option>
         @endforeach
    </select>
    <br>
    </td>
    </tr>
    <td><br><br>
        {!! Form::submit('Continuar',['class'=>'btn btn-success','style'=>'fontsize:16px' ]) !!}
        {!!Form::close() !!}

    </td>

        </table>
    </div>

      </div>
        <br><br><br><br><br><br><br>
        </div>
          </div>
            </div>
              </div>
                </div>
    @stop