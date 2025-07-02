<nav class="bg-white shadow mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- Logo --}}
                <div class="flex-shrink-0 flex items-center font-bold text-blue-600 text-xl">
                    <a href="{{ route('dashboard') }}">{{ config('app.name', 'AutoLak') }}</a>
                </div>

                {{-- Navigacija --}}
                <div class="hidden sm:-my-px sm:ml-10 sm:flex space-x-6 items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                    <a href="{{ route('dashboard.vehicles.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Vozila</a>
                    <a href="{{ route('dashboard.services.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Usluge</a>
                    <a href="{{ route('dashboard.bills.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Računi</a>
                    <a href="{{ route('dashboard.statuses.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Statusi</a>
                    {{-- <a href="{{ route('dashboard.users.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Korisnici</a> --}}
                </div>
            </div>

            {{-- Logout / Profil --}}
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">{{ auth()->user()->ime ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline text-sm">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
