@props(['project'])

<x-card>
    <a href="{{ route('projects.show', $project->id) }}" class="grid grid-rows-[max-content_1fr_max-content] h-full">
        <header class="mb-3">
            <h2 class="font-bold text-lg lg:text-xl">
                {{ $project->title }}
            </h2>
            <span class="text-xs text-gray-500 flex max-w-max items-center">
                @if ($project->is_paid)
                    💵 Paid
                @else
                    ❌ Not Paid
                @endif
            </span>
        </header>
        <main class="mb-4">
            <p class="text-sm texr-gray-700 mb-3">{{ $project->description }}</p>

            @if (count($project->tags) > 0)
                <ul class="flex flex-wrap gap-2 items-center">
                    @foreach ($project->tags as $tag)
                        <li class="rounded-full font-medium bg-green-200 text-xs px-2 leading-5 text-gray-700">
                            {{ $tag->name }}
                        </li>
                    @endforeach
                </ul>
            @endisset
    </main>
    <footer class="mt-2">
        <div>
            <span
                class="text-sm font-medium bg-indigo-50 text-indigo-400 border border-indigo-200 rounded-full px-2 left-5">
                Due Date: {{ Carbon\Carbon::parse($project->due_date)->format('M d Y') }}
            </span>
        </div>
    </footer>
</a>
</x-card>
