<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de notas</title>
    {!! Html::style('css/login2.css') !!}
    {!! Html::style('css/app.css') !!}

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  </head>
  <body style="background: #4f5b69;">
    <nav class="navbar navbar-default" style="background:#23282e; border: 1px solid #23282e; ">
      <div class="container-fluid">
        <div class="navbar-header" style="background:#23282e;">
            <a class="navbar-brand" href="#" style="color:white;">Sistemas de Gestión de notas</a>
        </div>
    </div>
</nav>
<div class="container">
  <section id="content" style="background:#23282E;">
    @include('alerts.errors')
    {!!Form::open(['route'=>'log.store', 'class'=>'form1', 'method'=>'POST'])!!}
    <h1 style="color:white;">Inicio de Sesión</h1>
    <img src="{{ asset('images/logoescuela.png') }}"/><br>
    <i class="fa fa-user fa-4x" id="user"></i>
    {!!Form::text('nombreU',null,['class'=>'inputs1', 'placeholder'=>'Ingresa su Usuario'])!!}<br>
    <i class="fa fa-key fa-4x" id="key"></i>
    {!!Form::password('password',['class'=>'inputs2', 'placeholder'=>'Ingresa tu contraseña'])!!}<br>
    {!!Form::submit('Iniciar',['class'=>'boton'])!!}
    {!!Form::close()!!}
  </section>
</div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
