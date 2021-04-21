@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Asignacion de Roles</h4>
    </section>
        <!-- Main content -->
    <section class="content">
        @switch($type)
            @case(1)
                <x-asignar-coordinador-pastor/>
                @break
            @case(2)
                <x-asignar-director-categoria/>
                @break
            @default
                
        @endswitch
        <h5></h5>
    </section>
</div>
    
@include('footer')