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
      <td>{{$gra->grado}}</td>
      <td>{{$as->materia}}</td>
      <td>{{$ActividadPadre->nombre}}</td>
      <td>{{$ActividadPadre->ponderacion}}%</td>
    </tr>
  </tbody>
