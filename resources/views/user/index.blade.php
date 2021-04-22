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
                      <a class="nav-link active" id="usuariosTab" data-toggle="pill" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuariosTab">
                      <section class="content">
                        <x-lista-usuarios :list="$directors"/>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </section>
</div>
    
@include('footer')