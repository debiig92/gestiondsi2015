<select class="form-control" id="grado_act" name="grado_act" required 
oninvalid="setCustomValidity('No tiene grados asignado aún. No puede crear actividades')"
oninput="validarMensaje(this);">
@foreach ($grados as $grado)
<option value="{{$grado->id}}" >{{$grado->grado}}</option>
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
