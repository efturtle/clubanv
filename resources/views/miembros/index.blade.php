<x-app-layout>
  <x-miembros-slot/>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              {{-- Check for feedback accion message --}}
              @if (session('message'))
                <h6>{{ session('message') }}</h6>                  
              @endif
              <x-filtro-miembros/>
              <br>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Club</th>
                    <th scope="col">Categoria</th>                    
                  </tr>
                </thead>
                <tbody>
                  {{-- Show the members here --}}
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
  </div>
</x-app-layout>