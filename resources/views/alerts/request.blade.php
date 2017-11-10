@if(count($errors)>0)
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <ul>
     <b>Alerta!</b>
       @foreach($errors->all() as $error)
      @if($error=='validation.unique')
      <li>El NIE del alumno ya existe</li>
      @endif
       @endforeach
   </ul>
</div>
@endif
