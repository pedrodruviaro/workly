<x-app-layout title="Edit your project">
    <x-slot name="header">
        <div class="flex justify-between flex-wrap gap-3 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit your project
            </h2>


            <div>
                <x-primary-button link href="{{ route('projects.show', $project) }}">Back to project</x-primary-button>
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mb-4">
            <x-info text="{{ session('success') }}" variant="success" />
        </div>
    @endif

    <section>
        <x-card>
            <div class="mb-4 lg:mb-6">
                <h2 class="text-lg font-semibold text-gray-900">{{ $project->title }}</h2>
            </div>

            <form action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4 mb-4">
                    <fieldset>
                        <x-input-label for="title" value="Title*" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            placeholder="The project title" autofocus value="{{ old('title', $project->title) }}" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </fieldset>

                    <fieldset>
                        <x-input-label for="description" value="Description*" />
                        <x-textarea id="description" class="block mt-1 w-full" type="text" name="description"
                            rows="5"
                            placeholder="A brief description of the project">{{ old('description', $project->description) }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </fieldset>

                    <fieldset>
                        <x-input-label for="value" value="Value*" />
                        <x-text-input id="value" class="block mt-1 w-full" type="text" name="value"
                            placeholder="$ 4,000 paid In 2x" value="{{ old('value', $project->value) }}" />
                        <x-input-error :messages="$errors->get('value')" class="mt-2" />
                    </fieldset>

                    <div class="grid gap-4 md:grid-cols-2 md:items-start">
                        <fieldset>
                            <x-input-label for="status" value="Status*" />

                            @php
                                $status = [
                                    'in_progress' => 'In Progress',
                                    'completed' => 'Completed',
                                    'on_hold' => 'On Hold',
                                ];
                            @endphp
                            <x-select :options="$status" value="{{ old('status', $project->status) }}" id="status"
                                class="block mt-1 w-full" type="text" name="status" />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </fieldset>

                        <fieldset>
                            <x-input-label for="date" value="Due Date*" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="due_date"
                                value="{{ old('due_date', \Carbon\Carbon::parse($project->due_date)->format('Y-m-d')) }}" />
                            <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                        </fieldset>
                    </div>

                    <div>
                        <x-input-label value="Tags" />
                        <div
                            class="grid gap-1.5 max-h-36 overflow-y-auto p-2 border border-gray-300 shadow-sm rounded-md">
                            @foreach ($tags as $tag)
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="tags[]" id="{{ $tag->slug }}"
                                        value="{{ $tag->id }}" class="rounded"
                                        @if ($projectTags->contains('id', $tag->id)) checked @endif>
                                    <label for="{{ $tag->slug }}"
                                        class="text-sm text-gray-800">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <x-primary-button>Save</x-primary-button>
                    </div>
                </div>
            </form>
        </x-card>
    </section>
</x-app-layout>
