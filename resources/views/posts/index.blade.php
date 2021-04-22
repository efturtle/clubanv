@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>
        <!-- Main content -->
    <section class="content">
        @foreach ($postlist as $post)
            <p>{{ $post->titulo }}</p>
            <p>{{ $post->sobre }}</p>
            <p>{{ $post->cuerpo }}</p>
            <br>
        @endforeach
    </section>
</div>
    
@include('footer')