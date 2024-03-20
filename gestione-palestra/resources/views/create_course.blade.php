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
                    <form method ="POST" action="{{ route('courses.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Descrizione</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="description" required>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Data inizio</label>
                            <input type="date" name="start_date" id="start_date" required>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Data fine</label>
                            <input type="date" name="end_date" id="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>