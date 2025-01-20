<x-app-layout title="Edit your task">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit your task
        </h2>
    </x-slot>

    <section>
        <x-card>
            <div class="mb-4 lg:mb-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Project: <strong>{{ $project->title }}</strong>
                </h2>
            </div>

            <form method="POST" action="{{ route('tasks.update', ['project' => $project, 'task' => $task]) }}"
                class="space-y-4">
                @csrf
                @method('PUT')

                <fieldset>
                    <x-input-label for="title" value="Title*" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                        placeholder="The task title" value="{{ old('title', $task->title) }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </fieldset>

                <fieldset>
                    <x-input-label for="description" value="Description" />
                    <x-textarea id="description" class="block mt-1 w-full" type="text" name="description"
                        rows="5"
                        placeholder="Something you want to add">{{ old('description', $task->description) }}</x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </fieldset>

                <div class="grid gap-4 md:grid-cols-2 md:items-start">
                    <fieldset>
                        <x-input-label for="status" value="Priority*" />

                        @php
                            $priorities = [
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                            ];
                        @endphp
                        <x-select :options="$priorities" value="{{ old('priority', $task->priority) }}" id="priority"
                            class="block mt-1 w-full" type="text" name="priority" />
                        <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                    </fieldset>

                    <fieldset>
                        <x-input-label for="date" value="Due Date*" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="due_date"
                            value="{{ old('due_date', $task->due_date) }}" />
                        <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                    </fieldset>
                </div>

                <div class="flex items-center flex-wrap gap-2">
                    <x-primary-button>Save</x-primary-button>
                    <x-primary-button link href="{{ route('projects.show', $project) }}"
                        variant="danger">Cancel</x-primary-button>
                </div>
            </form>
        </x-card>
    </section>
</x-app-layout>
