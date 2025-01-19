<x-app-layout title="{{ $project->title }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Your Project
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="mb-4">
            <x-info text="{{ session('success') }}" variant="success" />
        </div>
    @endif

    <section class="mb-10 grid gap-3 md:grid-cols-[2fr_1fr] md:items-start">
        <x-card>
            <div>
                <h2 class="text-lg font-medium text-gray-900 mb-2">{{ $project->title }}</h2>
                <p class="pre-wrap">{{ $project->description }}</p>
                <div class="mt-6 flex items-center gap-2 flex-wrap">
                    <x-primary-button link href="{{ route('projects.edit', $project) }}">Edit</x-primary-button>
                    <x-primary-button variant="outline">Mark as complete</x-primary-button>
                </div>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-3">
                <div>
                    <span
                        class="text-sm font-medium bg-indigo-100 text-indigo-600 border border-indigo-300 rounded-full px-2 left-5">
                        Due Date: {{ Carbon\Carbon::parse($project->due_date)->format('M d Y') }}
                    </span>
                </div>

                <span class="text-xs text-gray-500 flex max-w-max items-center">
                    @if ($project->is_paid)
                        💵 Paid
                    @else
                        ❌ Not Paid
                    @endif
                </span>

                @if (count($project->tags) > 0)
                    <ul class="flex flex-wrap gap-2 items-center">
                        @foreach ($tags as $tag)
                            <li class="rounded-full font-medium bg-green-200 text-xs px-2 leading-5 text-gray-700">
                                {{ $tag->name }}
                            </li>
                        @endforeach
                    </ul>
                @endisset

                <div>
                    <p class="text-sm text-gray-600">35% completed</p>
                    <div class="rounded-full w-full h-2 bg-orange-100">
                        <span class="bg-orange-400 block w-[35%] h-full rounded-full"></span>
                    </div>
                </div>
        </div>
    </x-card>
</section>


<section class="mb-4">
    <nav class="flex flex-wrap gap-2 items-end md:gap-4">
        <h2 class="text-lg lg:text-xl font-medium text-gray-900">Tasks</h2>
        <a class="text-sm text-gray-600 hover:text-gray-700 border-b-2 border-gray-600" href="#">Todo (2)</a>
        <a class="text-sm text-gray-600 hover:text-gray-700" href="#">Completed (3)</a>
    </nav>
</section>

<section>
    <ul class="space-y-3">
        @foreach ($tasks as $task)
            <x-task.card :$task showProjectButton="{{ false }}" />
        @endforeach
    </ul>
</section>

<section class="mt-6">
    {{ $tasks->links() }}
</section>
</x-app-layout>
