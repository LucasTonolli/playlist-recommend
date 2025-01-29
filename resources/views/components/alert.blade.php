@props(['type', 'message'])

@php
    $classes = match ($type) {
        'success' => 'bg-green-500 text-white',
        'error' => 'bg-red-500 text-white',
        'warning' => 'bg-yellow-500 text-black',
        default => 'bg-gray-500 text-white',
    };
@endphp

<div class="{{ $classes }} p-4 rounded-md">
    {{ $message }}
</div>
