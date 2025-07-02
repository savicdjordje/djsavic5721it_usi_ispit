@props(['for'])

@php
    $message = $errors->first($for);
@endphp

@if ($message)
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
@endif
