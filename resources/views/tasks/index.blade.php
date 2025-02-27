<x-app-layout title="Tasks" description="Manage all your tasks">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <section class="mb-4">
        <nav class="flex flex-wrap gap-2 items-center md:gap-4">
            <a class="text-sm text-gray-600 hover:text-gray-700 border-b-2 border-gray-600" href="#">Todo (6)</a>
            <a class="text-sm text-gray-600 hover:text-gray-700" href="#">Completed (10)</a>
        </nav>
    </section>

    <section>
        <ul class="space-y-3">

            @foreach ($tasks as $task)
                <x-task.card :$task />
            @endforeach
        </ul>
    </section>

    <section class="mt-6">
        {{ $tasks->links() }}
    </section>
</x-app-layout>
