@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                @if (session('message'))
                    <p class="text-success">{{ session('message') }}</p>
                @endif
            </div>
            <div class="card-body">
                <div class="row pb-2">
                    <div class="col-6">
                        <h6 class="text-bold">Nombre del Distrito</h6>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            <h5 class="px-3 mt-1">{{ $distrito->nombre }}</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <h6 class="text-bold">Ciudad</h6>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            <h5 class="px-3 mt-1">{{ $distrito->ciudad }}</h5>
                        </div>
                    </div>
                    
                </div>
                <div class="row pb-2">
                    <div class="col-6">
                        <h6 class="text-bold">Estado</h6>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-church"></i></span>
                            <h5 class="px-3 mt-1"> {{ $distrito->estado }}</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <h6 class="text-bold">Coordinador</h6>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                            @if ($distrito->coordinador_id == null)
                                    <td class="fw-bold">
                                        <div class="pl-2">
                                            <a href="/asignar/coordinador/{{ $distrito->id }}">
                                                <span class="bg-green-600  rounded text-white">Asignar</span>
                                            </a>
                                        </div>
                                    </td>    
                                @else
                                    <td class="fw-bold">hi</td>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-6">
                        <h6 class="text-bold">Pastor</h6>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-church"></i></span>
                            @if ($distrito->pastor_id == null)
                                    <td class="fw-bold">
                                        <div class="pl-2">
                                            <a href="/asignar/pastor/{{ $distrito->id }}">
                                                <span class="bg-green-600  rounded text-white">Asignar</span>
                                            </a>
                                        </div>
                                    </td>    
                                @else
                                    <td class="fw-bold">hi</td>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
    
@include('footer')