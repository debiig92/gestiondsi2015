<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<br><br>
<div class="container" style="width:970px; margin-left:-8px;">
  <div class="row">
    <div class="panel panel-primary filterable" style="border-color: #23282E;">
      <div class="panel-heading" style="background: #23282E;">
        <h3 class="panel-title">Actividades</h3>
        <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr class="filters">
            <th><input type="text" class="form-control" style="border-color:#23282E;" placeholder="Id" disabled></th>
            <th><input type="text" class="form-control" style="border-color:#23282E;" placeholder="Nombre" disabled></th>
            <th><input type="text" class="form-control" style="border-color:#23282E;" placeholder="ponderacion" disabled></th>
            <th><input type="text" class="form-control" style="border-color:#23282E;" placeholder="Tipo de actividad" disabled></th>
            <th><input type="text" class="form-control" style="border-color:#23282E;" placeholder="Actualizar" disabled></th>
            <th><input type="text" class="form-control" style="border-color:#23282E;" placeholder="Eliminar" disabled></th>
          </tr>
        </thead>
        <tbody>
          @if($actividades!="")
          @foreach($actividades as $ac)
          <tr>
            <td><input id="idact" name="idact" readonly value="{{$ac->id}}" style="border:none"></td>
            <td>{{$ac->nombre}}</td>
            <td>{{$ac->ponderacion}}</td>
            <td>{{$ac->tp}}</td>
            <td>
            <button data-toggle="modal" data-target="#squarespaceModal" onclick="Mostrar(this)" value="{{$ac->id}}" class="btn btn-primary center-block" style="background:#23282E; border-color:#23282E; margin-left:-10px">Actualizar</button>
            </td>
            <td>
              <a href="{{route('updateG.show',$ac->id)}}" class="btn btn-primary" style="background:#23282E; border-color:#23282E;">Eliminar</a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
function Mostrar(btn)
{
  var route="updateG/"+btn.value+"/edit";

  $.get(route, function(res)
  {
    var id = document.getElementById("idActividad");
    var nombre= document.getElementById("nombre");
    var ponderacion= document.getElementById("ponderacion");
    var padre=document.getElementById("actpadre");
    var asignatura=document.getElementById("as");
     id.value=res.id;
     nombre.value=res.nombre;
     ponderacion.value=res.ponderacion;
     padre.value=res.Actividades_idActividades;
     asignatura.value=res.ASIGNATURA_idASIGNATURA;
  });
}
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
$(document).ready(function(){
  $('.filterable .btn-filter').click(function(){
      var $panel = $(this).parents('.filterable'),
      $filters = $panel.find('.filters input'),
      $tbody = $panel.find('.table tbody');
      if ($filters.prop('disabled') == true) {
          $filters.prop('disabled', false);
          $filters.first().focus();
      } else {
          $filters.val('').prop('disabled', true);
          $tbody.find('.no-result').remove();
          $tbody.find('tr').show();
      }
  });

  $('.filterable .filters input').keyup(function(e){
      /* Ignore tab key */
      var code = e.keyCode || e.which;
      if (code == '9') return;
      /* Useful DOM data and selectors */
      var $input = $(this),
      inputContent = $input.val().toLowerCase(),
      $panel = $input.parents('.filterable'),
      column = $panel.find('.filters th').index($input.parents('th')),
      $table = $panel.find('.table'),
      $rows = $table.find('tbody tr');
      /* Dirtiest filter function ever ;) */
      var $filteredRows = $rows.filter(function(){
          var value = $(this).find('td').eq(column).text().toLowerCase();
          return value.indexOf(inputContent) === -1;
      });
      /* Clean previous no-result if exist */
      $table.find('tbody .no-result').remove();
      /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
      $rows.show();
      $filteredRows.hide();
      /* Prepend no-result row if all rows are filtered */
      if ($filteredRows.length === $rows.length) {
          $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
      }
  });
});
</script>
<style media="screen">
.filterable {
  margin-top: 15px;
}
.filterable .panel-heading .pull-right {
  margin-top: -20px;
}
.filterable .filters input[disabled] {
  background-color: transparent;
  border: none;
  cursor: auto;
  box-shadow: none;
  padding: 0;
  height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
  color: #23282E;
}
.filterable .filters input[disabled]::-moz-placeholder {
  color: #23282E;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
  color: #23282E;
}
.panel-title
{
  background: #23282E;
}
.panel-heading
{
  background: #23282E;
}
</style>
