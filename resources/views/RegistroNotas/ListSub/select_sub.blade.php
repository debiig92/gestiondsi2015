<select class="form-control" id="subActividades" name="subActividades" required
oninvalid="setCustomValidity('No tiene sub actividades asignadas a esta actividade. Debe crearla')"
oninput="validarMensaje(this);">
>
@foreach ($ActividadesHijas as $sub)
<option value="{{$sub->id}}">{{$sub->nombre}}</option>
@endforeach
</select>
<script>
function validarMensaje(elementoInput) {

     if(elementoInput.validity.patternMismatch){
        elementoInput.setCustomValidity('');
    }
    else {
        elementoInput.setCustomValidity('');
    }

}

</script>
