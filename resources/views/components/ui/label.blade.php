@props(['for' => null, 'value' => null])

<label
    @if($for) for="{{ $for }}" @endif
    class="block font-medium text-sm text-gray-700"
>
    {{ $value ?? $slot }}
</label>
