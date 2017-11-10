<div class="form-group" style="margin:30px;">
  <div class="controls"  style="width:195px;">
    <label class="control-label" style="margin-left:-25px;">Asignatura</label>
    <select class="form-control" id="act_asignatura" name="act_asignatura">
    @foreach ($asignaturas as $asignatura)
    <option value="{{$asignatura->id}}">{{$asignatura->materia}}</option>
    @endforeach
    </select>
  </div>
</div>
