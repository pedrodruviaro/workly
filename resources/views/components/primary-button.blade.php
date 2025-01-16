@props(['variant' => 'primary', 'link' => false])

@php

    $baseClasses =
        'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs  uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150';

    $variants = [
        'primary' =>
            'bg-gray-800 border border-transparent hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500 text-white',
        'danger' =>
            'bg-red-800 border border-transparent hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:ring-red-500 text-white',
        'outline' =>
            'border border-gray-800 hover:border-gray-600 focus:border-gray-600 active:border-gray-900 focus:ring-indigo-500 text-gray-800',
    ];

    $classes = $baseClasses . ' ' . $variants[$variant];
@endphp

@if ($link === true)
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
