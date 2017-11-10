<div class="form-group">
    {!! Form::label('Area Indicador: ') !!}
    <select class="form-control" id="areaindicador" name="areaindicador">
        @foreach ($area as $g)
        <option value="{{$g->id}}">{{$g->areaindicador}}</option>
        @endforeach
    </select>
    {!! Form::label('Seleccione el Grado: ') !!}
    <div class="form-group">
       {!!  Form::select('gradoP', array('1' => 'Kinder 4', '2' => 'Kinder 5', '3' => 'Preparatoria'), null,['class'=>'form-control']) !!}
    </div>
    {!! Form::label('Indicador: ') !!}
    {!! Form::text('INDICADOR',null,['class'=>'form-control','placeholder'=>'Ingrese el indicador','required']) !!}
</div>
