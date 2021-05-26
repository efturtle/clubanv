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
                  <th scope="col">Distrito</th>
                  <th scope="col">Club</th>
                  <th scope="col">Categoria</th>
                </tr>
              </thead>
              <tbody>
                {{-- Show the members here --}}
                @foreach ($miembros as $user)
                  <tr>
                    <td>
                      <a href="{{ route('miembro.show', $user->id) }}">
                        {{ $user->name }}
                      </a>
                    </td>
                    <td>{{ $user->miembro->club->distrito->nombre }}</td>
                    <td>{{ $user->miembro->club->nombreClub }}</td>
                    @switch($user->miembro->category)
                        @case(1)
                            <td>Aventurero</td>
                            @break
                        @case(2)
                            <td>Conquistador</td>
                            @break
                        @case(3)
                            <td>Guias Mayores</td>
                            @break
                        @default
                    @endswitch
                  </tr>
                @endforeach
              </tbody>
            </table>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col" class="bg-gray-300">Por Club</th>
                  <th scope="col" class="bg-gray-300">.</th>
                  <th scope="col" class="bg-gray-300">.</th>
                  <th scope="col" class="bg-gray-300">.</th>
                </tr>
              </thead>
              <tbody>
                  @if ($clubs == 'name')
                      <td class="bg-indigo-200">.</td>
                      <td class="bg-indigo-200">.</td>
                      <td class="bg-indigo-200">.</td>
                      <td class="bg-indigo-200">.</td>
                  @else
                @foreach ($clubs as $miembro)
                    <tr>
                        <td>
                        <a href="{{ route('miembro.show', $miembro->id) }}">
                            {{ $miembro->user->name }}
                        </a>
                        </td>
                        <td>{{ $miembro->club->distrito->nombre }}</td>
                        <td>{{ $miembro->club->nombreClub }}</td>
                        @switch($miembro->category)
                            @case(1)
                                <td>Aventurero</td>
                                @break
                            @case(2)
                                <td>Conquistador</td>
                                @break
                            @case(3)
                                <td>Guias Mayores</td>
                                @break
                            @default
                        @endswitch
                    </tr>
                @endforeach
                  @endif
                
              </tbody>
            </table>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col" class="bg-gray-300">Por Categoria</th>
                  <th scope="col" class="bg-gray-300">.</th>
                  <th scope="col" class="bg-gray-300">.</th>
                  <th scope="col" class="bg-gray-300">.</th>
                </tr>
              </thead>
              <tbody>
                  @if ($categories == 'name')
                      <td class="bg-indigo-200">.</td>
                      <td class="bg-indigo-200">.</td>
                      <td class="bg-indigo-200">.</td>
                      <td class="bg-indigo-200">.</td>
                  @else    
                    @foreach ($categories as $miembro)
                        <tr>
                        <td>
                            <a href="{{ route('miembro.show', $miembro->id) }}">
                            {{ $miembro->user->name }}
                            </a>
                        </td>
                        <td>{{ $miembro->club->distrito->nombre }}</td>
                        <td>{{ $miembro->club->nombreClub }}</td>
                        @switch($miembro->category)
                            @case(1)
                                <td>Aventurero</td>
                                @break
                            @case(2)
                                <td>Conquistador</td>
                                @break
                            @case(3)
                                <td>Guias Mayores</td>
                                @break
                            @default
                        @endswitch
                        </tr>
                    @endforeach
                  @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>