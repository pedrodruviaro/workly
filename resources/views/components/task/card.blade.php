@props(['showProjectButton' => true])

<x-card>
    <header class="flex flex-wrap gap-2 items-center mb-3">
        <span class="text-sm font-medium bg-indigo-100 text-indigo-600 border border-indigo-300 rounded-full px-2">
            Due Date: 20 Jan 2025
        </span>
        <span
            class="rounded-full font-medium bg-green-200 text-sm px-2 leading-5 text-green-800 flex items-center gap-1 max-w-max">
            <span class="w-2 h-2 rounded-full bg-green-400 block"></span>
            <span>Low</span>
        </span>
        {{-- <span
            class="rounded-full font-medium bg-cyan-200 text-sm px-2 leading-5 text-cyan-800 flex items-center gap-1 max-w-max">
            <span class="w-2 h-2 rounded-full bg-cyan-400 block"></span>
            <span>Medium</span>
        </span>
        <span
            class="rounded-full font-medium bg-red-200 text-sm px-2 leading-5 text-red-800 flex items-center gap-1 max-w-max">
            <span class="w-2 h-2 rounded-full bg-red-400 block"></span>
            <span>High</span>
        </span> --}}
    </header>
    <main class="mb-6">
        <h3 class="font-medium text-lg mb-1 text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Natus, quaerat?
        </h3>
        <p class="text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium, porro,
            fugiat amet est
            voluptatibus
            sit expedita quod harum molestiae a ea hic eaque, perferendis in quos sunt molestias aliquid vero!</p>
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
            <x-primary-button size="small" variant="outline">Project Details</x-primary-button>
        @endif
    </footer>
</x-card>
