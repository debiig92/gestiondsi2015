<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">Id</th>
      <th class="encabezado-registro-notas">Grado</th>
      <th class="encabezado-registro-notas">Asignatura</th>
      <th class="encabezado-registro-notas">Actividad</th>
      <th class="encabezado-registro-notas">Ponderacion</th>
      <th class="encabezado-registro-notas">Seleccione</th>
    </tr>
  </thead>
  <tbody><?php $i=0; ?>
    @foreach ($actividades as $act)
    <?php $idAct="id".$i;
          $fila=$i;
              ?>
      <tr>
      <td><input type="text" class="form-control" style="width:50px;"id="{{$idAct}}" name="{{$idAct}}" value="{{$act->id}}" readonly></td>
      <td>{{$act->grado}}</td>
      <td>{{$act->materia}}</td>
      <td>{{$act->nombre}}</td>
      <td >{{$act->ponderacion}}</td>
      <td id="{{$fila}}" value="{{$fila}}"><input type="radio" id="fila" name="fila" value="{{$fila}}" required></td>
      <?php $i=$i+1; ?>
      </tr>
    @endforeach
  </tbody>
</table>
