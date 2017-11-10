  <h2>Cambio de Contraseña</h2>
        <div class="form-group">
           {!!Form::label('label','Ingrese contraseña actual:')!!}
             {!!Form::password('anterior',['class'=>'form-control'])!!}
           </div>
          <div class="form-group">
           {!!Form::label('label2','Ingrese nueva contraseña:')!!}
           {!!Form::password('nueva',['class'=>'form-control'])!!}
          </div>
         