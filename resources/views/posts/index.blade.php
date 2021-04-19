@include('nav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>
        <!-- Main content -->
    <section class="content">
    @foreach ($postlist as $post)
        <p>{{ $post->title }}</p>
        <p>{{ $post->excerpt }}</p>
        <p>{{ $post->body }}</p>
    @endforeach

    </section>
</div>
    
@include('footer')