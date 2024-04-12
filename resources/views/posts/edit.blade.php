<x-app-layout>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">

              <div class="container h-100 mt-5">
                  <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-10 col-md-8 col-lg-6">
                      <h3 class="flex justify-center">Modifier l'article</h3>
                      <form action="{{ route('dashboard.update', $post->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group flex flex-col">
                          <label for="title" class="flex">Title</label>
                          <input type="text" class="form-control" id="title" name="title"
                            value="{{ $post->title }}" required>
                        </div>
                        <div class="form-group flex flex-col">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" rows="3" required>{{ $post->description }}</textarea>
                        </div>
                        <div class="form-group flex flex-col">
                          <label for="content">Contenu</label>
                          <textarea class="form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
                        </div>
                        <div class="flex justify-center	">
                          <button type="submit" class="btn mt-3 btn-primary border border-black rounded">Modifier l'article</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
