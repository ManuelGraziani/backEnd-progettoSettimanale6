@section('title', 'Dettaglio corso')

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
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h1 class="fs-1 fw-bold ">Corso {{ $course->name }}</h1>
                    <div>
                        <p class="fs-5">Descrizione: {{ $course->description }}</p>
                    </div>
                    <div class="mt-3">
                        <p class="fs-5">Data inizio: {{ $course->start_date }}</p>
                        <p class="fs-5">Data fine: {{ $course->end_date }}</p>
                    </div>
                    <div class="mt-3">
                        @if ($user->is_admin == 0 && $user->reservations->where('course_id', $course->id)->isEmpty())
                        <form method="POST" action="/reservations">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="start_date" value="{{ $course->start_date }}">
                            <input type="hidden" name="end_date" value="{{ $course->end_date }}">
                            <button type="submit" class="btn btn-outline-secondary">Iscriviti al corso</button>
                        </form>
                        @elseif ($user->is_admin == 0 && !$user->reservations->where('course_id', $course->id)->isEmpty())
                        <form method="POST" action="/reservations/{{ $user->reservations->where('course_id', $course->id)->first()->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Annulla iscrizione</button>
                        </form>
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>