
@include('alerts.request')
@include('alerts.exito')
@include('alerts.errors')
<div class="form-group">
    <h4><bold>Datos del alumno:</bold></h4>
</div>
<div class="form-group">
    {!! Form::label('NIE: ') !!}
    {!! Form::text('NIE',null,['class'=>'form-control','placeholder'=>'Ingrese el NIE del alumno con el siguiente formato: 0000000','pattern'=>'[0-9]{7}','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Nombre: ') !!}
    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del alumno','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Apellidos: ') !!}
    {!! Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Ingrese el apellido del alumno','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Fecha de nacimiento: ') !!}
    {!! Form::date('fecha_nac', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Lugar de nacimiento: ') !!}
    {!! Form::text('lugar_nac',null,['class'=>'form-control','placeholder'=>'Ingrese lugar de nacimiento del alumno','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Grado a matricular: ') !!}
    <select class="form-control" id="grado" name="grado">
        @foreach ($grado as $g)
        <option value="{{$g->id}}">{{$g->grado}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('Sexo: ') !!}
    {!!  Form::select('sexo', array('F' => 'F', 'M' => 'M'), null,['class'=>'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('Direccion: ') !!}
    {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese la direccion del alumno','required']) !!}
</div>

<div class="form-group">
    <h4><bold>Datos del familiares: </bold></h4>
</div>

<div class="form-group">
    {!! Form::label('Nombre del padre: ') !!}
    {!! Form::text('nombrePadre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del padre del alumno']) !!}
</div>
<div class="form-group">
    {!! Form::label('DUI: ') !!}
    {!! Form::text('DUIP',null,['class'=>'form-control','placeholder'=>'Ingrese el DUI con el siguiente formato: 00000000-0', 'pattern'=>'[0-9]{8}-[0-9]{1}']) !!}
</div>

<div class="form-group">
    {!! Form::label('Nombre de la madre: ') !!}
    {!! Form::text('nombreMadre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la madre del alumno']) !!}
</div>
<div class="form-group">
    {!! Form::label('DUI: ') !!}
    {!! Form::text('DUIM',null,['class'=>'form-control','placeholder'=>'Ingrese el DUI con el siguiente formato: 00000000-0', 'pattern'=>'[0-9]{8}-[0-9]{1}']) !!}
</div>

<table class="table">
    <tr>
        <td>
            <div class="form-group">
                <h4><bold>Partida de nacimiento </bold></h4>
            </div>
        </td>

        <td>
            <div class="form-group">
                <h4><bold>Datos del responsable </bold></h4>
            </div>
        </td>

    </tr>
    <tr>
        <td>
            <div class="form-group">
                {!! Form::label('N°: ') !!}
                {!! Form::number('numero',null,['class'=>'form-control','min'=>'0','placeholder'=>'Ingrese el numero de la partida de nacimiento','pattern'=>'[0-9]','required']) !!}
            </div>
        </td>
        <td> <div class="form-group">
                {!! Form::label('Nombre: ') !!}
                {!! Form::text('nombreE',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del responsable','required']) !!}
            </div>
        </td>
    </tr>
    <tr>
        <td><div class="form-group">
                {!! Form::label('Folio: ') !!}
                {!! Form::number('folio',null,['class'=>'form-control','min'=>'0','placeholder'=>'Ingrese el numero de folio de la partida de nacimiento','required']) !!}
            </div></td>
        <td><div class="form-group">
                {!! Form::label('DUI: ') !!}
                {!! Form::text('DUIE',null,['class'=>'form-control','placeholder'=>'Ingrese el DUI con el siguiente formato: 00000000-0', 'pattern'=>'[0-9]{8}-[0-9]{1}','required']) !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
                {!! Form::label('Tomo: ') !!}
                {!! Form::number('tomo',null,['class'=>'form-control','min'=>'0','placeholder'=>'Ingrese el numero de tomo de la partida de nacimiento']) !!}
            </div>
        </td>

        <td>
            <div class="form-group">
                {!! Form::label('Direccion: ') !!}
                {!! Form::text('direccionE',null,['class'=>'form-control','placeholder'=>'Ingrese la direccion del responsable','required']) !!}
            </div>
        </td>

    </tr>
    <tr>
        <td>
            <div class="form-group">
                {!! Form::label('Libro: ') !!}
                {!! Form::number('libro',null,['class'=>'form-control','min'=>'0','placeholder'=>'Ingrese el numero del libro de la partida de nacimiento','required']) !!}
            </div>
        </td>

        <td>
            <div class="form-group">
                {!! Form::label('Telefono: ') !!}
                {!! Form::text('telefonoE',null,['class'=>'form-control','placeholder'=>'Ingrese el telefono con el siguiente formato: 2222-2222', 'pattern'=>'[0-9]{4}-[0-9]{4}','required']) !!}
            </div>
        </td>
    </tr>

</table>
<hr class="colorgraph" style="
  height: 5px;
  width: 760px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #2E353D, #2E353D 12.5%, #4F5B69 12.5%, #4F5B69 25%, #2E353D 25%, #2E353D 37.5%, #4F5B69 37.5%, #4F5B69 50%,  #2E353D 50%,  #2E353D 62.5%, #4F5B69 62.5%, #4F5B69 75%, #2E353D 75%,  #2E353D 87.5%, #4F5B69 87.5%, #4F5B69);#4F5B69
  background-image: -moz-linear-gradient(left, #2E353D, #2E353D 12.5%, #4F5B69 12.5%, #4F5B69 25%, #2E353D 25%, #2E353D 37.5%, #4F5B69 37.5%, #4F5B69 50%,  #2E353D 50%,  #2E353D 62.5%, #4F5B69 62.5%, #4F5B69 75%, #2E353D 75%,  #2E353D 87.5%, #4F5B69 87.5%, #4F5B69);
  background-image: -o-linear-gradient(left, #2E353D, #2E353D 12.5%, #4F5B69 12.5%, #4F5B69 25%, #2E353D 25%, #2E353D 37.5%, #4F5B69 37.5%, #4F5B69 50%,  #2E353D 50%,  #2E353D 62.5%, #4F5B69 62.5%, #4F5B69 75%, #2E353D 75%, #2E353D  87.5%, #4F5B69 87.5%, #4F5B69);
  background-image: linear-gradient(to right, #2E353D, #2E353D 12.5%, #4F5B69 12.5%, #4F5B69 25%, #2E353D 25%, #2E353D 37.5%, #4F5B69 37.5%, #4F5B69 50%,  #2E353D 50%,  #2E353D 62.5%, #4F5B69 62.5%, #4F5B69 75%, #2E353D 75%, #2E353D 87.5%, #4F5B69 87.5%, #4F5B69);
">
