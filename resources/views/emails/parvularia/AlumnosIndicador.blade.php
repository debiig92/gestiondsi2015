<div class="container" style="padding-top: 20px">
  <table class="table table-striped table-bordered" style="width: 800px">
    <thead>
    <th style="width: 1%">NIE</th>
    <th style="width: 2%">Nombre</th>
    <th style="width: 2%">Apellidos</th>
    <th colspan = "3">Indicadores</th>

    </thead>
      @foreach($alumnos as $alumno)
      <tbody>
      <td >{{$alumno->NIE}}</td>
      <td >{{$alumno->nombre}} </td>
      <td >{{$alumno->apellidos}} </td>
      <td>{!!link_to_route('alumno.cuadro', $title = 'Cuadro 1', $parameters = [$title, $alumno->NIE], $attributes = ['class'=>'btn btn-primary'])!!}</td>
      <td>{!!link_to_route('alumno.cuadro', $title = 'Cuadro 2', $parameters = [$alumno->NIE], $attributes = ['class'=>'btn btn-primary'])!!}</td>
      <td>{!!link_to_route('alumno.cuadro', $title = 'Cuadro 3', $parameters = $alumno->NIE, $attributes = ['class'=>'btn btn-primary'])!!}
      </td>
      </tbody>
      @endforeach
  </table>
</div>