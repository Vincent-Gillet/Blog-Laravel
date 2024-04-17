  <x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}

                      <div class="container mt-5">
                        <div class="grid gap-4 grid-cols-2">
                          @foreach ($users as $user)
                            <div class="flex items-start gap-6 lg:flex-col">
                              <div class="card w-100 h-100">
                                <div class="card-header">
                                  <h5 class="card-title">{{ $user->name }}</h5>
                                </div>
                                <div class="card-footer">
                                  <div class="row">
                                    <div class="col-sm">
                                      <a href="{{ route('user.show', $user->id) }}"
                                class="btn btn-primary btn-sm border border-black rounded">Regarder</a>
                                    </div>
                                    <div class="col-sm">
                                      <a href="{{ route('user.edit', $user->id) }}"
                                class="btn btn-primary btn-sm border border-black rounded">Modifier</a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
