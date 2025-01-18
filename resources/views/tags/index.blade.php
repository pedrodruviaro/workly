<x-app-layout title="Tags" description="Manage your project tags">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>

    <section class="mb-10">
        <x-card>
            <div class="mb-4 lg:mb-6">
                <h2 class="text-lg font-medium text-gray-900">Create a new tag</h2>
            </div>

            <form>
                <div class="mb-4 grid gap-4 md:grid-cols-2 md:items-start md:gap-2">
                    <fieldset>
                        <x-input-label for="name" value="Name*" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required
                            autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </fieldset>

                    <fieldset>
                        <x-input-label for="slug" value="Slug*" />
                        <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                    </fieldset>
                </div>

                <x-primary-button type="submit">Create</x-primary-button>
            </form>
        </x-card>
    </section>

    <section>
        <x-card>
            <div class="mb-4 lg:mb-6">
                <h2 class="text-lg font-medium text-gray-900">Manage your tags</h2>
            </div>

            <ul class="space-y-3">
                @foreach ($tags as $tag)
                    <x-tag.list-item :$tag />
                @endforeach
            </ul>
        </x-card>
    </section>
</x-app-layout>
