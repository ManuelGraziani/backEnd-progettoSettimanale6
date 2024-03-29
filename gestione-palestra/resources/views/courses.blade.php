@section('title', 'Corsi')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Corsi') }}
            </h2>
            @if(Auth::user()->is_admin == 1)
            <a href="{{ route('courses.create') }}" class="btn btn-outline-secondary">Aggiungi Corsi</a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(count($courses) > 0)
                    <div class="row g-3">
                        @foreach($courses as $course)
                        <div class="col my-3">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h2 class="card-title fs-5 fw-bold">{{$course->name}}</h2>
                                    <p class="card-text">{{$course->description}}</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{route('courses.show', $course->id)}}" class="btn btn-outline-secondary">Dettagli</a>
                                        @if(auth()->user()->is_admin == 1)
                                        <div class="d-flex justify-content-between gap-2">
                                            <a href="{{route('courses.edit', $course->id)}}" class="btn btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="{{route('courses.destroy', $course->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                    @else
                    <h2>Non ci sono corsi</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>