<x-app-layout title="Edit your project">
    <x-slot name="header">
        <div class="flex justify-between flex-wrap gap-3 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit your project
            </h2>
        </div>
    </x-slot>

    <section>
        <x-card>
            <div class="mb-4 lg:mb-6">
                <h2 class="text-lg font-semibold text-gray-900">PROJECT_NAME</h2>
            </div>

            <form>
                <div class="space-y-4 mb-4">
                    <fieldset>
                        <x-input-label for="title" value="Title*" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required
                            placeholder="The project title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </fieldset>

                    <fieldset>
                        <x-input-label for="description" value="Description*" />
                        <x-textarea id="description" class="block mt-1 w-full" type="text" name="description"
                            rows="5" required placeholder="A brief description of the project"></x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </fieldset>

                    <fieldset>
                        <x-input-label for="value" value="Value*" />
                        <x-text-input id="value" class="block mt-1 w-full" type="text" name="value" required
                            placeholder="$ 4,000 paid In 2x" />
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
                            <x-select :options="$status" id="status" class="block mt-1 w-full" type="text"
                                name="status" required />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </fieldset>

                        <fieldset>
                            <x-input-label for="date" value="Due Date*" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"
                                required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </fieldset>
                    </div>

                    <div>
                        <x-input-label value="Tags" />
                        <div
                            class="grid gap-1.5 max-h-36 overflow-y-auto p-2 border border-gray-300 shadow-sm rounded-md">
                            @php
                                $count = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
                            @endphp
                            @foreach ($count as $i)
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="" id="website" class="rounded">
                                    <label for="website" class="text-sm text-gray-800">Website</label>
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
