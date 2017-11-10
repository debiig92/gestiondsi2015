<div class="form-group">

    {!! Form::text('nombreA',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del alumno']) !!}
    {!! Form::select('grado', $grado, null,['class'=>'form-control']) !!}
</div>