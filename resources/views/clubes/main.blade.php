@include('nav')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clubes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Página pricipal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- ./row -->
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card card-info card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="historialClubesTab" data-toggle="pill" href="#historialClubes" role="tab" aria-controls="historialClubes" aria-selected="false">Historial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="alta-club-tab" data-toggle="pill" href="#alta-club" role="tab" aria-controls="alta-club" aria-selected="true">Alta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Fotos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Directiva</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="historialClubes" role="tabpanel" aria-labelledby="historialClubesTab">
                  <section class="content">
                    <x-historial-club :list="$clublist"> </x-historial-club>
                  </section>
                </div>
                <div class="tab-pane fade " id="alta-club" role="tabpanel" aria-labelledby="alta-club-tab">
                  <!-- Main content -->
                  <section class="content">
                      <x-alta-club></x-alta-club>
                  </section>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  
                </div>
                
                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">

                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>

  @include('footer')

  <script src="../js/SAsystems/swa_save.js"></script>
