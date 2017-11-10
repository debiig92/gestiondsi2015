<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">Nombre</th>
      <th class="encabezado-registro-notas">Actividad 1</th>
      <th class="encabezado-registro-notas">Actividad 2</th>
      <th class="encabezado-registro-notas">Actividad 3</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($alumnos as $alumno)
    <tr id="fila-1">&nbsp;&nbsp;
      <td value="{{$alumno->NIE}}">{{$alumno->nombre}}&nbsp;&nbsp; {{$alumno->apellidos}}</td>
      <td contentEditable="true" id="act1">7</td>
      <td contentEditable="true" id="act2">8</td>
      <td contentEditable="true" id="act3">9</td>
    </tr>
    @endforeach
  </tbody>
</table>
