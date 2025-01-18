@props(['tag'])

<li class="bg-gray-50 p-2 md:p-4 rounded-lg border flex justify-between gap-2 items-center">
    <div>
        <p class="font-medium">{{ $tag->name }}</p>
        <p class="text-sm text-gray-600">{{ $tag->slug }}</p>
    </div>

    <div>
        <x-primary-button variant="danger" size="small">Remove</x-primary-button>
    </div>
</li>
