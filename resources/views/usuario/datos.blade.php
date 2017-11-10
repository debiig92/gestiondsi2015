

                     <div class="form-group">
                        {!!Form::label('name','Nombre del Docente:')!!}
                         {!!Form::text('nombre',null,['class'=>'form-control'])!!}
                    </div>
                     <div class="form-group">
                        {!!Form::label('apellido','Apellido:')!!}
                         {!!Form::text('apellido',null,['class'=>'form-control'])!!}
                      </div>
                     <div class="form-group">
                          {!!Form::label('dui','N° DUI:')!!}
                         {!!Form::text('DUI',null,['class'=>'form-control','placeholder'=>'00000000-0', 'pattern'=>'[0-9]{8}-[0-9]{1}'])!!}
                       </div>
                     <div class="form-group">
                          {!!Form::label('email','email:')!!}
                         {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'example@notas.com','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}'])!!}
                        </div>
                     <div class="form-group">
                          {!!Form::label('telefono','Telefono:')!!}
                         {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'2222-2222', 'pattern'=>'[0-9]{4}-[0-9]{4}'])!!}
                         </div>
