@props(['href' => '#', 'active' => false])

@if ($active)
    <span class="text-gray-500">{{ $slot }}</span>
@else
    <a href="{{ $href }}" class="text-blue-600 hover:underline">{{ $slot }}</a>
@endif
