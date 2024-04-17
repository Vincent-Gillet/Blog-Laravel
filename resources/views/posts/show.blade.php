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
                      <h3 class="flex justify-center">Voir l'article</h3>
                        <div class="form-group flex flex-col">
                          <h4>{{ $post->title }}</h4>
                        </div>
                        <div class="form-group flex flex-col">
                          <p>{{ $post->description }}</p>
                        </div>
                        <div class="form-group flex flex-col">
                          <p>{{ $post->content }}</p>
                        </div>
                        <div class="form-group flex flex-col">
                          <h5>Auteur :</h5>
                          <p>{{ $post->user_id }}</p>
                        </div>
                        <div class="form-group flex flex-col">
                          <h5>Catégories :</h5>
                          @foreach ($categories as $category)
                            <p>- {{ $category->name_category }}</p>
                          @endforeach
                        </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
