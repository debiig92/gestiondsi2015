@extends('layouts.menu')
@section('content')
<div class="container" id="container-inscripcion-alumno">
    <div class="container-fluid"  id="container-fluid-incripcion-alumno">
        <div class="row" id="row-inscripcion-alumno">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background:#EFF3F6; width:1000px;">
                    <div class="panel-body">

                        <h2>Registro Indicadores</h2>
                        <hr class="colorgraph">
                        {!! Form::model(Request::all(),['route'=>'registrarIndicador.store','method'=>'POST']) !!}
                        <label>  NIE: &nbsp;</label><input text name="nie" value="{{$nie}}" readonly="readonly" style="background-color:#EFF3F6;width:55px;border-width:0; " >&nbsp;&nbsp;<label>  Nombres: &nbsp;</label>{!!$alumno!!} &nbsp; &nbsp;<label>  Apellidos: &nbsp;</label>{!!$apellido!!}
       <h3 style="margin-left: 30px">{{$area[0]->areaindicador}} </h3><input text name="area" value="{{$area[0]->id}}" readonly="readonly" style="width:0px;border-width:0">
                        @include('alerts.exito')
       <div style="width: 730px; margin-left: 25px">
         <table class="table table-striped table-bordered">
             <thead>
               <th style="width: 550px">Descripcion</th>
               <th  style="text-align: center ">Registro</th>
             </thead>
             <?php $i=0; ?>
               @foreach($indicadores as $indicador)

             <tbody>
               <tr>
                   <td ><input text name="num_id[]" value="{{$indicador->id}}" readonly="readonly" style="width:0px;border-width:0;visibility:hidden">{{$indicador->INDICADOR}}.
                   </td><td>@include('parvularia.SelectLetra')</td></tr>
              <tr>

               </tbody>
               <?php $i++; ?>
               @endforeach
           </table>


           {!!link_to_route('listadoKP', $title = 'Regresar', $parameters = [$gradoQ], $attributes = ['class'=>'btn btn-primary','id'=>'Regresar-LinkBlue'])!!}
           {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'Guardar-Notas' ]) !!}
           {!! Form:: close() !!}
           <div style="margin-left: 280px">{!!$indicadores->render()!!}</div>
       </div>

   </div>
                    @include('parvularia.NotadeIndicacion')


@stop