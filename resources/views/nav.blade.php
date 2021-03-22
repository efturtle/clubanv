<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Normalize CSS --}}
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="assets/css/app.css">
    {{-- AdminLTE v3 --}}
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    {{-- FontAwesome 5.13.1 --}}
    <link rel="stylesheet" href="assets/css/all.min.css">
    {{-- ionicframework 4.5.10 --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/4.5.10/css/ionicons.min.css">
    {{-- Bootstrap select --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
        
          <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <a href="../controlador/salir.php" class="nav-link">Cerrar Sesion</a>
        </u>
        </nav>
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="#" class="brand-link">
            <img src="assets/img/campin.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Sistema</span>
          </a>
        
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="assets/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">Pr. Montejo
                    <!--< ?php
                    echo $_SESSION['nombre_us'];
                    ?> -->
                </a>
              </div>
            </div>
        
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
        
                <li class="nav-header">Menú</li>
                <li class="nav-item">
                  <a href="../vistas/adm_sistema.php" class="nav-link">
                    <i class="nav-icon fa fa-home"></i>
                    <p>
                      Inicio
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-cubes"></i>
                    <p>
                      Estadisticas
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../vistas/asoc_estadisticas.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Asociación</p>
                        </a>
                      </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../vistas/dtto_estadisticas.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Distrito</p>
                        </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>Clubes
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../vistas/Clubes2.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Alta de clubes</p>
                         <!--<script src="../js/sweetAlert.js"></script>-->
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../vistas/Navbar_club.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Miembros</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../vistas/traspasos.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Traspasos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../vistas/solicitud-inv.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Solicitud de Investidura</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-fire"></i>
                    <p>
                      Camporee
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-folder"></i>
                    <p>
                      Recursos
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../vistas/asoc_estadisticas.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Manuales</p>
                        </a>
                      </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="../vistas/dtto_estadisticas.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Curso bautismal</p>
                        </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="../Support.php" class="nav-link">
                    <i class="nav-icon fa fa-cogs"></i>
                    <p>
                      Soporte
                    </p>
                  </a>
                </li>   
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>