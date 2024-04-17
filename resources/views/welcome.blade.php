@include('layouts.front.head')
{{-- @include('layouts.front.article') --}}

@foreach($posts as $post)
    <div id="docs-card-content" class="flex flex-col items-start gap-6 bg-white rounded-lg w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4 mb-4">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        <p>{{ $post->content }}</p>
        <div class="form-group flex flex-col">
            <h5>Catégories :</h5>
            @foreach ($categories as $category)
                <p>- {{ $category->name_category }}</p>
            @endforeach
        </div>
    </div>
@endforeach
@include('layouts.front.footer')