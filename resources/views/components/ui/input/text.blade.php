@props(['type' => 'text'])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50',
    ]) }}
/>
