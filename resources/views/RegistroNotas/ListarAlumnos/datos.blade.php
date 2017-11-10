<table class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th class="encabezado-registro-notas">N° de Alumnos</th>
      <th class="encabezado-registro-notas">Grado</th>
      <th class="encabezado-registro-notas">Asignatura</th>
      <th class="encabezado-registro-notas">Sub-Actividad</th>
      <th class="encabezado-registro-notas">Ponderacion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" name="num" id="num" style="width:100px; border:none; background:#f9f9f9;" value="{{$num}}" readonly></td>
      <td>{{$grado->grado}}</td>
      <td>{{$asignatura->materia}}</td>
      <td>{{$Act->nombre}}</td>
      <td>{{$Act->ponderacion}}%</td>
    </tr>
  </tbody>
