<!DOCTYPE html>
<html lang="en">
<head>
    @include('libraries')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Directivo</title>
</head>
    <body>
        <header class="flex justify-between items-center bg-gray-300 h-14">
            <div>
                <a href="/index"><p class="font-nav text-3xl ml-2 mt-3 text-gray-600">Inicio</p></a>
            </div>
            <div class="flex">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-coolgray-300 mx-2 pt-1 hover:bg-teal-500">Logout</button>
                </form>
            </div>
        </header>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <form action="/distrito" method="POST">
                @csrf
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Nombre
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="name" type="text" name="name" :value="old('name')" required autofocus>
                    {{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
                </div>
                <div class="flex justify-end"><button class="bg-blue-800 h-12 w-1/4 sm:w-1/5"> <span class="text-gray-100">Enviar</span> </button></div>
            </form>
        </div>
    </body>
</html>