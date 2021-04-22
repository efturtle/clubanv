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
                <h5>hi</h5>
                @break
            @case(2)
                <h5>hello</h5>
                @break
            @default
        @endswitch
        <h5></h5>
    </section>
</div>
    
@include('footer')