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

          <li class="nav-item pl-1">
            <a href="#" class="nav-link">
                <i class="fas fa-user-circle"></i>
              <p> En Mantenimiento </p>
            </a>
          </li>  

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>