<table class="table table-bordered table-hover" id="tab_logic">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Ponderación</th>
        </tr>
    </thead>
    <tbody id="sub" name="sub"></tbody>
</table>
<br><br>
<a id="add_row"  class="btn btn-default pull-left btn btn-primary">Agregar Actividad</a>
<a id='delete_row' class="pull-right btn btn-default btn btn-primary">Borrar Actividad</a>
{{$variable=""}}
<script>
$(document).ready(function () {
    var i = 0;
    var ponderacionesTotal = 0;
    $("#add_row").click(function () {
        /*Está suma a la variable i la realizaré
         *ya que llega hasta el valor de -1 luego de borrar todo
         *y presionar el botón de "Borrar actividad" más veces.
         */
        if (i == -1) i++;

        //Creando fila nueva
        var filaNueva = document.createElement("tr");
        filaNueva.id = "fila" + i;
        $('#sub').append(filaNueva);

        //Agregando columnas a la fila creada
        $('#fila' + i).append("<td>" + (i + 1) + "</td><td><input id='nombre" + i + "'name='nombre" + i + "' type='numer' min='0' max='100' placeholder='Nombre' class='form-control input-md' required</td><td><input id='act"+i+"'name='act"+i+"' type='number' placeholder='Ponderación' class='form-control input-md' required oninput='validarMensaje(this);'</td>");


        /*Agregando un listener al elemento creado del evento 'onblur' para sumar la 			 *ponderación
         */
        $('#act' + i).on("blur", sumarPonderacion);

        i++;
        //Cuenta los numeros de subactividades y los envia al input Numero de subactividades
        var elem = document.getElementById("subact");
        elem.value = document.getElementById('tab_logic').getElementsByTagName('td').length / 3;
    });
    $("#delete_row").click(function () {
        if ((i + 1) > 0) {
            /* Restar ponderación*/
            restarPonderacion();

            /* Quitar el listener del elemento eliminado */
            $('#act' + (i - 1)).off("blur", sumarPonderacion);

            /* Eliminando la fila */
            $("#fila" + --i).remove();

            var elem = document.getElementById("subact");
            elem.value = document.getElementById('tab_logic').getElementsByTagName('td').length / 3;
        }
    });

    /* Suma de las ponderaciones */
    function sumarPonderacion() {
        /* Se verifica que sea número y no esté vacío luego se suma*/
        if (!isNaN(parseInt(this.value))) {
            ponderacionesTotal = ponderacionesTotal + parseInt(this.value);

          ///  $('#ponderacionesTotal').text(ponderacionesTotal);
          var pond= document.getElementById('pond');
          pond.value=ponderacionesTotal;

            /* Cambiar el input a "deshabilitado" para que no sea modificado posteriormente. Cambiarlo a "readonly" no funcionaría porque no deshabilita el evento.*/
            $(this).prop('readonly', true);
        }
    }

    function restarPonderacion() {
        if (!isNaN(parseInt(document.getElementById("act" + (i - 1)).value))) {
            ponderacionesTotal = ponderacionesTotal - parseInt(document.getElementById("act" + (i - 1)).value);
        }

        if (!isNaN(ponderacionesTotal)) {
          //  $('#ponderacionesTotal').text(ponderacionesTotal);
          var pond= document.getElementById('pond');
          pond.value=ponderacionesTotal;
        }
    }
});

</script>
