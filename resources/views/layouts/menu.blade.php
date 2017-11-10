<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Sistema Gestion de notas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/menu.css') !!}
    {!! Html::style('css/incripcionAlumno.css') !!}
    {!! Html::style('css/ayuda.css') !!}
    {!! Html::style('css/RegistroNotas.css') !!}
    {!! Html::script('js/RegistroNotas.js') !!}
    {!! Html::script('js/botonPulsable.js') !!}
    {!! HTML::script('js/indicadoresParv.js') !!}
    {!! HTML::script('js/calendario.js') !!}
    {!! Html::script('js/datepicker.js') !!}
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::style('css/datepicker.css') !!}
    {!! Html::style('css/tabAyuda.css') !!}
    <!-- Admin LTE-->
    {!! Html::style('dist/css/AdminLTE.min.css') !!}
    {!! Html::style('dist/css/skins/_all-skins.min.css') !!}
    {!! Html::script('plugins/chartjs/Chart.js') !!}
    {!! Html::script('plugins/chartjs/Chart.min.js') !!}
    {!! Html::script('dist/js/app.min.js') !!}
    {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
    {!! Html::script('dist/js/app.min.js') !!}
    {!! Html::script('dist/js/demo.js') !!}
    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}



    <!-- -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!--******************** toggle  ********************************-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- *********************************************************** -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/icons8/bower-webicon/v0.10.7/angular-webicon.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/icons8/bower-webicon/v0.10.7/jquery-webicon.min.js"></script>

</head>



<body style="background:#EFF3F6; width: 100px;">
<nav class="navbar navbar-default" role="navigation" id="panel-superior">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"data-target=".navbar-ex1-collapse" >
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if ($tipo == 1)
        <a class="navbar-brand" href="#" id="name-tipo-panel">Director</a>
        @elseif ($tipo == 2)
        <a class="navbar-brand" href="#" id="name-tipo-panel">Docente Básica</a>
        @else
        <a class="navbar-brand" href="#" id="name-tipo-panel">Docente Parvularia</a>
        @endif
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a id="name-user"class="dropdown-toggle" data-toggle="dropdown" href="#">{{$nombre}}
                    <i id="bla" class="fa fa-user fa-2x "></i><i id="menu-superior-user"class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user"style="">
                    <li><a href="{!! URL::to('/password') !!}" ><i class="fa fa-lock fa-fw"></i>Cambiar Contraseña</a></li>
                    <li class="divider"></li>
                    <li><a href="{!! URL::to('/') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="contenedorTemp">
      <div class="nav-side-menu" id="style-1" style="margin-top:60px; border-radius: 4px 4px 0px 0px; overflow: scroll;">
          <div class="brand"><img src="{{ asset('images/logoescuela.png') }}"/></div>
         <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i><i data-toggle="collapse" data-target="#menu-content"></i>

          <div class="menu-list">
              <div class="menu-list">
                  <ul id="menu-content" class="menu-content collapse out">

                      <li class="collapsed active">
                      <i><webicon icon="color-icons:home"style="width: 30px; height:30px;"/></i>
                      <a href="{!! URL::to('/log') !!}" class="item-menu">Inicio </a></li>
                                            <!-- ======================================================================= -->
                      @if ($tipo == 1)
                      <li  data-toggle="collapse" data-target="#usuarios" >
                      <i><webicon icon="color-icons:businessman" style="width: 30px; height: 30px;"/></i><a href="#" class="item-menu">Gestion de Usuarios<span class="arrow"></span></a>
                     </li>
                      <ul class="sub-menu collapse" id="usuarios">
                         <li class="active" ><a href="{!! URL::to('/usuario/create') !!}" class="item-submenu">Crear usuario</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/usuario') !!}">Consultar usuario</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/password/create') !!}">Cambiar contraseñas</a></li>



                      </ul>
                      @endif
                      <!-- ======================================================================= -->
                      <li  data-toggle="collapse" data-target="#products" >
                          <i><webicon icon="color-icons:conference-call" style="width: 30px; height: 30px;"/></i>
                          <a href="#" class="item-menu">Gestion de Alumnos<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="products">
                          <li class="active" ><a href="{!! URL::to('/alumno/create') !!}" class="item-submenu">Inscribir Alumno</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/consultar') !!}">Consultar Alumno</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/actualizarAlumno') !!}">Actualizar Alumno</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/egresar') !!}">Des inscribir Alumno</a></li>
                      </ul>
                      <!-- ======================================================================= -->
                      @if ($tipo == 2 )
                      <li data-toggle="collapse" data-target="#new" class="collapsed">
                          <i><webicon icon="color-icons:inspection" style="width: 30px; height: 30px;"/></i><a href="#" class="item-menu">Gestionar  notas<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="new">
                          <li class="item-submenu"><a href="{!! URL::to('/registrar') !!}" class="item-submenu">Registrar Notas</li>
                          <li class="item-submenu"><a href="{!! URL::to('/procesar') !!}" class="item-submenu">Procesar Notas</li>
                         <li class="item-submenu"><a href="{!! URL::to('/registrarAsistencia') !!}" class="item-submenu">Registrar Asistencia</li>
                      </ul>
                      @endif
<!-- =======================================================================================================================================-->
@if ($tipo == 2 )
<li data-toggle="collapse" data-target="#cond" class="collapsed">
    <i><webicon icon="color-icons:businesswoman" style="width:30px; height:30px; margin-left:-10px;"/></i><a href="#" class="item-menu" style="margin-left:-10px;">Gestionar  Conducta<span class="arrow"></span></a>
</li>
<ul class="sub-menu collapse" id="cond">
    <li class="item-submenu"><a href="{!! URL::to('/conducta') !!}">Registrar Conducta</a></li>
    <li class="item-submenu"><a href="{!! URL::to('/consultarConducta') !!}">Consultar Conducta</a></li>
      <li class="item-submenu"><a href="{!! URL::to('/eliminarConducta') !!}">Modificar Conducta</a></li>
</ul>
@endif

<!-- ======================================================================================================================================-->
                      <!-- ======================================================================= -->
                      @if ($tipo == 1)
                      <li data-toggle="collapse" data-target="#area" class="collapsed" >
                          <i><webicon icon="color-icons:list" style="width: 30px; height: 30px;"/></i>
                          <a href="#" class="item-menu">Gestion de Area indicador<span class="arrow"></span></a>
                      </li>

                      <ul class="sub-menu collapse" id="area">
                          @if ($tipo == 1 )
                          <li class="item-submenu"><a href="{!! URL::to('/areaIndicador/create') !!}">Crear Area de indicador</a></li>
                            @endif
                          <li class="item-submenu"><a href="{!! URL::to('/areaIndicador') !!}">Consultar Area de indicador</a></li>
                      </ul>
                      @endif
                      <!-- ======================================================================= -->
                      @if ($tipo == 1 OR $tipo== 3)
                      <li data-toggle="collapse" data-target="#indicadores" class="collapsed" >
                         <i><webicon icon="color-icons:todo-list" style="width: 30px; height: 30px;"/></i>
                            <a href="#" class="item-menu">Gestion de Indicadores<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="indicadores">
                          @if ($tipo == 1)
                          <li class="active" ><a href="{!! URL::to('/indicador/create') !!}" class="item-submenu">Crear Indicador</a></li>
                          @endif
                        <li class="item-submenu"><a href="{!! URL::to('/indicador') !!}">Consultar Indicador</a></li>
                      </ul>

                      @endif
                      <!-- ======================================================================= -->
                      @if ($tipo == 3 )
                      <li data-toggle="collapse" data-target="#registroi" class="collapsed">
                          <i><webicon icon="color-icons:data-recovery" style="width: 30px; height: 30px;"/></i>
                          <a href="#" class="item-menu">Registro de indicadores<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="registroi">
                          <li class="item-submenu"><a href="{!! URL::to('/registrarIndicador') !!}">Registrar Indicadores</a></li>
                      </ul>
                      @endif
                      <!-- ======================================================================= -->

                      <li data-toggle="collapse" data-target="#reportes" class="collapsed">
                        <!--  <i><webicon icon="color-icons:bar-chart" style="width: 30px; height: 30px;"/></i>-->
                        <i><webicon icon="color-icons:document" style="width: 30px; height: 30px;"/></i>
                          <a href="#" class="item-menu" style="margin-left:-3px">Generar Reportes Academicos<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="reportes">
                          @if ($tipo == 3 OR $tipo == 1)
                          <li class="item-submenu"><a href="{!! URL::to('/registrarIndicadorLibreta') !!}" class="item-menu">Libreta Parvularia</a></li>
                          @endif
                          @if ($tipo == 2 OR $tipo == 1)
                          <li class="item-submenu"><a href="{!! URL::to('/boletas') !!}" class="item-menu">Boletas de notas</a></li>
                          @endif

                          <li class="item-submenu"><a href="{!! URL::to('/listar') !!}" class="item-menu">Listas</a></li>

                        <!--     <li class="item-submenu"><a href="{!! URL::to('/cuadroF') !!}" class="item-menu">Cuadros Finales</a></li>-->

                      </ul>

                      <!-- ======================================================================= -->
                      @if ($tipo == 1)
                      <li data-toggle="collapse" data-target="#asignatura" class="collapsed">
                          <i><webicon icon="color-icons:reading" style="width: 30px; height: 30px;"/></i>
                          <a href="#" class="item-menu">Grados y Asignaturas<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="asignatura">
                          <li class="item-submenu"><a href="{!! URL::to('/asignatura') !!}" class="item-menu">Asignar Grados y Asignaturas</a></li>
                            <li class="item-submenu"><a href="{!! URL::to('/consultarOrientador') !!}" class="item-menu">Consultar Asignaciones de Grados y Asignaturas</a></li>
                            <li class="item-submenu"><a href="{!! URL::to('/modificarOrientador') !!}" class="item-menu">Modificar Grados y Asignaturas</a></li>
                      </ul>
                      @endif
                      @if ($tipo == 1 OR $tipo== 2)
                      <li><i><webicon icon="color-icons:graduation-cap" style="width: 30px; height: 30px;"/></i>
                      <a href="{!! URL::to('/promo') !!}" class="item-menu">Promocionar Alumnos</a></li>
                      @endif
                      @if ($tipo == 1 OR $tipo== 2)
                      <li><i><webicon icon="color-icons:graduation-cap" style="width: 30px; height: 30px;"/></i>
                      <a href="{!! URL::to('/promover') !!}" class="item-menu">Promover Alumnos</a></li>
                      @endif
                      @if ($tipo == 1)
                      <li><I><webicon icon="color-icons:calendar" style="width: 30px; height: 30px;"/></i>
                      <a href="{!! URL::to('/escolar') !!}" class="item-menu">Gestion Año Escolar</a></li>
                      @endif
                      @if($tipo==2)
                      <li data-toggle="collapse" data-target="#actividades" class="collapsed">

                        <i><webicon icon="color-icons:view-details" style="width: 30px; height: 30px;"/></i>
                        <a href="#" class="item-menu">Gestionar Actividades<span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="actividades">
                          <li class="item-submenu"><a href="{!! URL::to('/actividad') !!}" class="item-menu">Crear Actividad</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/subactividad') !!}" class="item-menu">Crear Sub-Actividadess</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/updateActividad') !!}" class="item-menu">Consultar Actividades por Grado</a></li>
                          <li class="item-submenu"><a href="{!! URL::to('/updateG') !!}" class="item-menu">Consultar Actividades por materia</a></li>
                      </ul>
                      @endif
                      <li><i><webicon icon="color-icons:info" style="width: 30px; height: 30px;"/></i><a href="#modal1" class="item-menu">Ayuda</a></li>
                      <br><br><br><br>
                  </ul>
              </div>
          </div>
  </div>
<div id="page-wrapper" style=" width:450px; margin-left:700px;">
<!--Ayuda-->
<div id="modal1" class="modalmask">
  <div class="modalbox movedown">
    <a href="#close" title="Close" class="close" >X</a>
    <img src="images/ayuda.png">
    <object type="application/pdf" data="pdf/Manual.pdf#toolbar=1&amp;navpanes=0&amp;scrollbar=1" width="800" height="800">
      <param name="src" value="manual.pdf#toolbar=1&amp;navpanes=0&amp;scrollbar=1" />
      <p style="text-align:center; width: 60%;">Adobe Reader no se encuentra o la versión no es compatible, utiliza el icono para ir a la página de descarga <br />
        <a href="http://get.adobe.com/es/reader/" onclick="this.target='_blank'">
          <img src="reader_icon_special.jpg" alt="Descargar Adobe Reader" width="32" height="32" style="border: none;" /></a></p>
        </object>
      </div>
    </div>
@yield('content')
</div>
</div>
</body>
</html>
