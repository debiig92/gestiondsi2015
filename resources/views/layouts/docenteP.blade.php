<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Responsive Navigation Menu - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/menu.css') !!}
    {!! Html::style('css/incripcionAlumno.css') !!}
    {!! Html::style('css/tableIndicadores.css') !!}
    {!! HTML::script('js/indicadoresParv.js') !!}
    <style>

    </style>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" defer></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
</head>
<body style="background:#EFF3F6; width: 1200px;">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<nav class="navbar navbar-default" role="navigation" id="panel-superior">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" id="name-tipo-panel">Panel Docente Parvularia</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a id="name-user"class="dropdown-toggle" data-toggle="dropdown" href="#">{!!$nombre!!}
                    <i id="bla" class="fa fa-user fa-2x "></i><i id="menu-superior-user"class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div id="wrapper">
    <div class="nav-side-menu" style="margin-top:60px; border-radius: 4px 4px 0px 0px;">
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">
                    <li class="collapsed active"><i class="fa fa-home fa-2x"></i><a href="#" class="item-menu">Inicio</a></li>
                    <li  data-toggle="collapse" data-target="#products" >
                        <i class="fa fa-user fa-2x"></i>
                        <a href="#" class="item-menu">Gestion de Alumnos<span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="products">
                        <li class="active" ><a href="#" class="item-submenu">Inscribir Alumno</a></li>
                        <li class="item-submenu"><a href="#">Consultar Alumno</a></li>
                        <li class="item-submenu"><a href="#">Actualizar Alumno</a></li>
                        <li class="item-submenu"><a href="#">Desinscribir Alumno</a></li>

                    </ul>

                    <li data-toggle="collapse" data-target="#products3" >
                        <i class="fa fa-list-ol  fa-2x"></i>
                        <a href="#" class="item-menu">Gestion de Area indicador<span class="arrow"></span></a>
                    </li>

                    <ul class="sub-menu collapse" id="products3">
                        <li class="item-submenu"><a href="{!! URL::to('/areaIndicador') !!}">Crear Area de indicador</a></li>
                        <li class="item-submenu"><a href="{!! URL::to('/areaIndicador/create') !!}">Consultar Area de indicador</a></li>
                        <li class="item-submenu"><a href="#">Actualizar Area de indicador</a></li>
                        <li class="item-submenu"><a href="#">Eliminar Area de indicador</a></li>


                    </ul>


                    <li  data-toggle="collapse" data-target="#products2" class="collapsed" >
                        <i class="fa fa-list-ol  fa-2x"></i>
                        <a href="#" class="item-menu">Gestion de Indicadores<span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="products2">
                        <li class="active" ><a href="{!! URL::to('/indicadores') !!}" class="item-submenu">Crear Indicador</a></li>
                        <li class="item-submenu"><a href="#">Consultar Indicador</a></li>
                        <li class="item-submenu"><a href="#">Actualizar Indicador</a></li>
                        <li class="item-submenu"><a href="#">Eliminar Indicador</a></li>

                    </ul>
                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                        <i class="fa fa-pencil fa-2x"></i><a href="#" class="item-menu">Registro de indicadores<span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li class="item-submenu"><a href="{!! URL::to('/registrar_indicador') !!}">Registrar Indicadores</a></li>
                        <li class="item-submenu">Registrar Asistencia Semanal</li>

                     </ul>


                    <li data-toggle="collapse" data-target="#service" class="collapsed">
                        <i class="fa fa-level-up fa-fw fa-2x"></i><a href="#" class="item-menu">Promocionar Alumnos</a></li>
                    <li><i class="fa fa-folder-open fa-2x"></i><a href="#" class="item-menu">Generar Boletas de informe Trimestral</a></li>
                    <li><i class="fa fa-lock fa-2x"></i><a href="#" class="item-menu">Cambiar Contraseña</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="page-wrapper" style=" width:450px; margin-left:500px;">
    @yield('content')
</div>

</body>
</html>
