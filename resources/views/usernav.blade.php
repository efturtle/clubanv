<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
              this.closest('form').submit();">
            {{ __('Log out') }}
          </x-responsive-nav-link>
        </form>
    </ul>
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('assets/img/campin.png') }}"
          alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">ANV</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/avatar04.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if (Auth::user()->name)
              <p class="text-gray-300"> {{ Auth::user()->name }} </p>
          @endif
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Estadisticas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/asoc_estadisticas.php" class="nav-link">
                    <i class="fa fa-circle nav-icon"></i>
                    <p>Asociación</p>
                  </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/dtto_estadisticas.php" class="nav-link">
                    <i class="fa fa-circle nav-icon"></i>
                    <p>Distrito</p>
                  </a>
                </li>
            </ul>
          </li>
          <ul class="nav-item">
            <li class="nav-item">
              <a href="/club" class="nav-link pl-4 hover:bg-gray-600">
                <i class="fas fa-cube"></i>
                <p class="pl-1">Club</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/club/create" class="nav-link pl-4 hover:bg-gray-600">
                <i class="fas fa-users"></i>
                <p class="pl-1">Miembros</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link pl-4 hover:bg-gray-600">
                <i class="fas fa-exchange-alt"></i>
                <p class="pl-1">Traspasos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../vistas/solicitud-inv.php" class="nav-link hover:bg-gray-600">
                <i class="fa fa-circle nav-icon"></i>
                <p>Solicitud de Investidura</p>
              </a>
            </li>
          </ul>
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
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/asoc_estadisticas.php" class="nav-link">
                    <i class="fa fa-circle nav-icon"></i>
                    <p>Manuales</p>
                  </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/dtto_estadisticas.php" class="nav-link">
                    <i class="fa fa-circle nav-icon"></i>
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