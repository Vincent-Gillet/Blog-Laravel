@include('layouts.front.head')
{{-- @include('layouts.front.article') --}}

    <div>
        <form method="GET" action="{{ route('articles') }}" class="w-full flex flex-col items-start gap-6 bg-white rounded-lg w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4 mb-4
        ">
          <div class="form-group flex flex-col">
              <label for="category">Catégories</label>
              <select id="category" name="categories[]" class="form-control text-black" multiple>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">
                          {{ $category->name_category }}
                      </option>
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Afficher les articles</button>
          <button type="submit" formaction="{{ route('articles') }}" class="btn btn-primary">Voir tous les articles</button>
        </form>
        @foreach($posts as $post)
            <div id="docs-card-content" class="flex flex-col items-start gap-6 bg-white rounded-lg w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4 mb-4">
                <div class="form-group flex flex-col">
                    <img src="{{ Storage::url($post->picture) }}" alt="Image de l'article">                       
                </div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <p>{{ $post->content }}</p>
                <div class="form-group flex flex-col">
                    @foreach ($post->categories as $category)
                        <p>{{ $category->name_category }}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
@include('layouts.front.footer')