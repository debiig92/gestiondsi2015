<div class="form-group">
    {!! Form::text('nombreA',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del alumno']) !!}
    <select class="form-control" id="grado" name="grado">
        @foreach ($grado as $g)
        <option value="{{$g->id}}">{{$g->grado}}</option>
        @endforeach
    </select>
</div>