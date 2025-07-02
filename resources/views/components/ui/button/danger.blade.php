<button
    {{ $attributes->merge(['class' => 'px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition']) }}
>
    {{ $slot }}
</button>
