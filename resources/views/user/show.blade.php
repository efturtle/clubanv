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
                            <label for="exampleInputEmail1">Nombre de usuario</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <h5 class="px-3 mt-1">{{ $user->name }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1">Email</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-question-circle"></i></span>
                                <h5 class="px-3 mt-1"> {{ $user->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <x-baja-usuario :id="$user->id" :name="$user->name"></x-baja-usuario>
                    <x-eliminar-usuario :id="$user->id" :name="$user->name"> </x-eliminar-usuario>
                </div>
        </div>

    </section>
</div>
    
@include('footer')