<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @if(Auth::user()->is_admin == 1)
            <a href="{{ route('courses.create') }}" class="btn btn-outline-secondary">Aggiungi Corsi</a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Benvenuto!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
