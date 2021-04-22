@include('nav')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('message'))
            <p class="text-yellow-800">{{ session('message') }}</p>
        @endif
    </section>
    
</div>


@include('footer')