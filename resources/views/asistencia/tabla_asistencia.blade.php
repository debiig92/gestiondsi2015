<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">NIE</th>
      <th class="encabezado-registro-notas">Nombre</th>
      <th class="encabezado-registro-notas">Lunes</th>
      

    </tr>
  </thead>
  <tbody>
 
    @foreach($alumnos as $row)
    <tr id="fila-1">
      <td>{{$row->NIE}}</td>
      <td>{{$row->nombre}}  {{$row->apellidos}}</td>
      <td> {!!Form::checkbox('asist','value','true')!!}</td>
      
    </tr>
  @endforeach

  

  </tbody>
</table>
