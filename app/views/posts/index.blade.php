@foreach($posts as $post)

    <p>{{ $post->title }} : {{ $post->body }}</p>
    
@endforeach