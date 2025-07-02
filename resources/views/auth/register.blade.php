<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Ime -->
        <div>
            <x-input-label for="ime" :value="__('Ime')" />
            <x-text-input id="ime" class="block mt-1 w-full" type="text" name="ime" :value="old('ime')" required autofocus />
            <x-input-error :messages="$errors->get('ime')" class="mt-2" />
        </div>

        <!-- Prezime -->
        <div class="mt-4">
            <x-input-label for="prezime" :value="__('Prezime')" />
            <x-text-input id="prezime" class="block mt-1 w-full" type="text" name="prezime" :value="old('prezime')" required />
            <x-input-error :messages="$errors->get('prezime')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Broj telefona -->
        <div class="mt-4">
            <x-input-label for="broj_telefona" :value="__('Broj telefona')" />
            <x-text-input id="broj_telefona" class="block mt-1 w-full" type="text" name="broj_telefona" :value="old('broj_telefona')" required />
            <x-input-error :messages="$errors->get('broj_telefona')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role (skriveno ili dropdown) -->
        <input type="hidden" name="role" value="klijent" />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
