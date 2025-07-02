@props(['message' => ''])

@if ($message)
    <div class="fixed top-4 right-4 z-50 bg-green-500 text-white px-4 py-2 rounded shadow">
        {{ $message }}
    </div>
@endif
