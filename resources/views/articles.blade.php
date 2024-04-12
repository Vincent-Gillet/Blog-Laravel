@include('layouts.front.head')
{{-- @include('layouts.front.article') --}}

@foreach($posts as $post)
    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        <p>{{ $post->content }}</p>
    </div>
@endforeach
@include('layouts.front.footer')