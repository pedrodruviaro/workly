@props(['task', 'showProjectButton' => true])

<x-card>
    <header class="flex flex-wrap gap-2 items-center mb-3">
        <span class="text-sm font-medium bg-indigo-100 text-indigo-600 border border-indigo-300 rounded-full px-2">
            Due Date: {{ Carbon\Carbon::parse($task->due_date)->format('M d Y') }}
        </span>

        @php
            $prioritiesClasses = [
                'low' => 'bg-green-200 text-green-800',
                'medium' => 'bg-cyan-200 text-cyan-800',
                'high' => 'bg-red-200 text-red-800',
            ];
        @endphp
        <span
            class="{{ $prioritiesClasses[$task->priority] }} rounded-full font-medium text-sm px-2 leading-5 flex items-center gap-1 max-w-max">
            <span class="w-2 h-2 rounded-full bg-current"></span>
            <span>{{ $task->priority }}</span>
        </span>
    </header>
    <main class="mb-6">
        <h3 class="font-medium text-lg mb-1 text-gray-800">{{ $task->title }}</h3>
        <p class="text-gray-600">{{ $task->description }}</p>
    </main>
    <footer class="flex justify-between flex-wrap gap-2">
        <div class="flex gap-3">
            <button aria-lable="Mark as complete"
                class="bg-green-400 border hover:bg-green-500 focus:bg-green-500 focus:ring-green-200 rounded-md p-1.5">
                <img src="/images/icons/check.svg" width="20" height="20" aria-hidden="true" alt="">
            </button>

            <button aria-lable="Mark as complete"
                class="bg-cyan-400 border hover:bg-cyan-500 focus:bg-cyan-500 focus:ring-cyan-200 rounded-md p-1.5">
                <img src="/images/icons/edit.svg" width="20" height="20" aria-hidden="true" alt="">
            </button>
        </div>

        @if ($showProjectButton)
            <x-primary-button size="small" variant="outline" link
                href="{{ route('projects.show', $task->project->id) }}">Project Details</x-primary-button>
        @endif
    </footer>
</x-card>
