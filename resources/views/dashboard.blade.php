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
                    {{-- {{ __("You're logged in!") }} --}}

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                          {{-- <a class="navbar-brand h1" href={{ route('dashboard') }}>Blog Laravel</a> --}}
                          <div class="d-grid gap-3 w-full">
                            <div class="col ">
                              <a id="ajouter" class="btn btn-primary text-white
                              {{-- link-dark text-decoration-none border border-black rounded-full px-4 py-3 bg-black text-white --}}
                              " href={{ route('dashboard.create') }} onmouseover="this.className='btn btn-secondary text-white'"
                              onmouseout="this.className='btn btn-primary text-white'">Ajouter un article</a>
                            </div>
                            <div class="col ">
                              <a id="ajouter" class="btn btn-primary text-white
                              {{-- link-dark text-decoration-none border border-black rounded-full px-4 py-3 bg-black text-white --}}
                              " href={{ route('category.create') }} onmouseover="this.className='btn btn-secondary text-white'"
                              onmouseout="this.className='btn btn-primary text-white'">Ajouter une catégorie</a>
                            </div>
                            <form method="GET" action="{{ route('dashboard') }}" class="w-full
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
                              <button type="submit" formaction="{{ route('dashboard') }}" class="btn btn-primary">Voir tous les articles</button>
                            </form>
                          </div>
                        </div>
                      </nav>
                      <div class="container mt-5">
                        <div class="grid gap-4 grid-cols-2">
                          @foreach ($posts as $post)
                            <div class="flex items-start gap-6 lg:flex-col">
                              <div class="card w-100 h-100">
                                <div class="card-header">
                                  <h5 class="card-title">{{ $post->title }}</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">{{ $post->description }}</p>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">{{ $post->content }}</p>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">{{ $post->name }}</p>
                                </div>
                                <div class="card-body">
                                  <h5>Auteur :</h5>
                                  <p>{{ $post->user->name }}</p>
                                </div>
                                <div class="card-body">
                                  <h5>Catégories :</h5>
                                  @foreach ($post->categories as $category)
                                    <p>{{ $category->name_category }}</p>
                                  @endforeach
                                </div>
                                <div class="card-footer">
                                  <div class="row">
                                    <div class="col-sm">
                                      <a href="{{ route('dashboard.show', $post->id) }}"
                                class="btn btn-primary btn-sm border border-black rounded">Regarder</a>
                                    </div>
                                    <div class="col-sm">
                                      <a href="{{ route('dashboard.edit', $post->id) }}"
                                class="btn btn-primary btn-sm border border-black rounded">Modifier</a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('dashboard.destroy', $post->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="font-bold btn btn-danger btn-sm border border-black rounded">Supprimer</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
