<x-app-layout title="PROJECT_NAME">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Your Project
        </h2>
    </x-slot>

    <section class="mb-10 grid gap-3 md:grid-cols-[2fr_1fr] md:items-start">
        <x-card>
            <div>
                <h2 class="text-lg font-medium text-gray-900 mb-2">PROJECT_NAME</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius consequuntur explicabo voluptas nisi.
                    Corporis laudantium beatae veniam facilis modi perspiciatis ratione tempore assumenda culpa natus
                    magnam repellat velit commodi quae fuga nam in facere accusamus, nihil possimus minus distinctio
                    placeat eveniet officia. Magni itaque quam quisquam dicta similique vel rem?</p>
                <div class="mt-6 flex items-center gap-2 flex-wrap">
                    <x-primary-button>Edit</x-primary-button>
                    <x-primary-button variant="outline">Mark as complete</x-primary-button>
                </div>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-3">
                <div>
                    <span
                        class="text-sm font-medium bg-indigo-100 text-indigo-600 border border-indigo-300 rounded-full px-2 left-5">
                        Due Date: 20 Jan 2025
                    </span>
                </div>
                <p class="text-xs text-gray-500">Not Paid</p>
                <ul class="flex flex-wrap gap-2 items-center">
                    <li class="rounded-full font-medium bg-green-200 text-xs px-2 leading-5 text-gray-700">
                        Website
                    </li>
                    <li class="rounded-full font-medium bg-green-200 text-xs px-2 leading-5 text-gray-700">
                        Wordpress
                    </li>
                </ul>

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
            @php
                $count = [1, 1];
            @endphp
            @foreach ($count as $i)
                <x-task.card showProjectButton="{{ false }}" />
            @endforeach
        </ul>
    </section>

    <section class="mt-6">
        {{-- pagination --}}
        <div class="bg-gray-600 h-4 opacity-25 max-w-60 mx-auto"></div>
    </section>
</x-app-layout>
