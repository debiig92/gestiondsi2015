<script>
    $(function(){
        marcar = function(elemento){
            elemento = $(elemento);
            elemento.prop("checked", true);
        }

        desmarcar = function(elemento){
            elemento = $(elemento);
            elemento.prop("checked", false);
        }
    });
</script>
<input type="button" class="btn btn-primary" onclick="marcar(':checkbox')" value="Marcar todos">
<input type="button" class="btn btn-success" onclick="desmarcar(':checkbox')" value="Desmarcar">

<table class="table table-striped" style="background:#EFF3F6;">
    <tr class="success" >
        <th style="background:#2E353D; color:white">NIE</th>
        <th style="background:#2E353D; color:white">Apellido</th>
        <th style="background:#2E353D; color:white">Nombre</th>
        <th style="background:#2E353D; color:white">Estado</th>
    </tr>
    @foreach($alumno as $user)
    <tr>
        <td>{{$user->NIE}}</td>
        <td>{{$user->apellidos}}</td>
        <td>{{$user->nombre}}</td>
        <td>{!!Form::checkbox('prov[]',$user->NIE)!!}
        </td>
    </tr>
    @endforeach
</table>
  {!!$alumno->render()!!}
