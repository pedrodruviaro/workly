@props(['text', 'variant' => 'info'])

@php
    $variants = [
        'info' => 'bg-indigo-200',
        'success' => 'bg-green-200',
        'alert' => 'bg-red-200',
    ];
@endphp

<div class="{{ $variants[$variant] }} shadow-sm py-2 p-3 rounded-lg max-w-max" x-data="{ show: true }" x-show="show"
    x-init="setTimeout(() => show = false, 3000)">
    <p class="text-sm font-medium">{{ $text }}</p>
</div>
