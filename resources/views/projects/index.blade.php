<x-app-layout title="Projects" description="Your projects">
    <x-slot name="header">
        <div class="flex justify-between flex-wrap gap-3 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>

            <div>
                <x-primary-button link href="{{ route('projects.create') }}">Create new</x-primary-button>
            </div>
        </div>
    </x-slot>

    <section class="mb-4">
        <nav class="flex flex-wrap gap-2 items-center md:gap-4">
            <a class="text-sm text-gray-600 hover:text-gray-900 border-b-2 border-gray-600" href="#">All (10)</a>
            <a class="text-sm text-gray-600 hover:text-gray-700" href="#">In Progress (6)</a>
            <a class="text-sm text-gray-600 hover:text-gray-700" href="#">Completed (3)</a>
            <a class="text-sm text-gray-600 hover:text-gray-700" href="#">On Hold (1)</a>
        </nav>
    </section>

    <section class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @php
            $count = [1, 1, 1, 1, 1, 1, 1, 1];
        @endphp
        @foreach ($count as $i)
            <x-project.card />
        @endforeach
    </section>

    <section class="mt-6">
        {{-- pagination --}}
        <div class="bg-gray-600 h-4 opacity-25 max-w-60 mx-auto"></div>
    </section>
</x-app-layout>
