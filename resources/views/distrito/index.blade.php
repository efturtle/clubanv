@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h4>Lista de Distritos</h4>
                    @if (session('message'))
                        <p class="text-success">{{ session('message') }}</p>
                    @endif
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead><tr>
                        <th scope="col">Nombre</th>  
                        <th scope="col">Ciudad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Pastor</th>
                        <th scope="col">Coordinador</th>
                        <th scope="col">Editar</th>
                    </tr></thead>
        
                    <tbody> 
                        @foreach ($list as $distrito)
                            <tr>
                                <td class="fw-bold">  
                                    <a href="/distrito/{{ $distrito->id }}">{{ $distrito->nombre }}</a>
                                </td>
                                <td class="fw-bold"> {{ $distrito->ciudad }}</td>
                                <td class="fw-bold"> {{ $distrito->estado }} </td>
                                @if ($distrito->pastor_id == null)
                                    <td class="fw-bold">                                        
                                        <a href="/asignar/pastor/{{ $distrito->id }}">
                                            <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                        </a>
                                    </td>    
                                @else
                                    <td class="fw-bold">hi</td>
                                @endif
                                @if ($distrito->coordinador_id == null)
                                    <td class="fw-bold">
                                        <a href="/asignar/coordinador/{{ $distrito->id }}">
                                            <span class="bg-green-600 center rounded w-1/2 text-white">Asignar</span>
                                        </a>
                                    </td>    
                                @else
                                    <td class="fw-bold">hi</td>
                                @endif
        
                                
                                <td>
                                    <a href="/club/edit/{{ $distrito->id }}">
                                        <button class="btn btn-outline-warning" ><i class="fas fa-pen-square"></i></button>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>        
    </section>
</div>
    
@include('footer')