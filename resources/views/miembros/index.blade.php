@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
              <div class="card card-info card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="miembrosTab" data-toggle="pill" href="#miembros" role="tab" aria-controls="miembros" aria-selected="false">Miembros</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="altaMiembrosTab" data-toggle="pill" href="#altaMiembros" role="tab" aria-controls="altaMiembros" aria-selected="true">Alta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="requisitosMiembrosTab" data-toggle="pill" href="#requisitosMiembros" role="tab" aria-controls="requisitosMiembros" aria-selected="true">Requisitos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tarjetasMiembrosTab" data-toggle="pill" href="#tarjetasMiembros" role="tab" aria-controls="tarjetasMiembros" aria-selected="true">Tarjetas</a>
                      </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="miembros" role="tabpanel" aria-labelledby="miembrosTab">
                      <section class="content">
                        <x-lista-miembros :list="$miembroslist"/>
                      </section>
                    </div>
                    <div class="tab-pane fade " id="altaMiembros" role="tabpanel" aria-labelledby="altaMiembrosTab">
                      <!-- Main content -->
                      <section class="content">
                          <x-alta-miembros/>
                      </section>
                    </div>
                    <div class="tab-pane fade" id="requisitosMiembros" role="tabpanel" aria-labelledby="requisitosMiembrosTab">
                      hola requisitos
                    </div>
                    
                    <div class="tab-pane fade" id="tarjetasMiembros" role="tabpanel" aria-labelledby="tarjetasMiembrosTab">
                        hola tarjetas
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
        </div>
    </section>
</div>
    
@include('footer')


