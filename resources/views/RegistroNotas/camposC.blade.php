<table class="table table-striped table-bordered">
    <tr>
        <th style="background:#2E353D; color:white">id</th>
        <th style="background:#2E353D; color:white">Aspecto</th>
        <th  style="background:#2E353D; color:white">Concepto</th>
    </tr>

  @foreach($IndicadoresConducta as $ic)
    <tr>
      <td>
      {!!Form::text('indicadoresC[]', $ic->id,['class'=>'form-control','readonly'=>'readonly'])!!}
      </td>
        <td>{{$ic->NOMBREINDICADOR}}</td>
        <td>{!! Form::select('concepto[]', array('E' => 'E', 'MB' => 'MB','B' => 'B'), null,['class'=>'form-control']) !!}</td>
    </tr>
  @endforeach
