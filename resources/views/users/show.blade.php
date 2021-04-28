<x-app-layout>
    <x-user-slot/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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

                    <x-baja-usuario :user="$user"/>
                    <x-eliminar-usuario :user="$user"/>
                    <span class="mr-2">Editar Usuario</span>
                    <a href="{{ route('user.edit', $user) }}"> <button class="btn btn-info"><i class="fa fa-ban" aria-hidden="true"></i></button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>