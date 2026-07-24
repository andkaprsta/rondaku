<x-guest-layout>

    <div class="mb-8 text-center">

        <img
            src="{{ asset('img/logo-rondaku.png') }}"
            alt="Logo RondaKu"
            class="w-28 h-28 mx-auto object-contain">

        <h1 class="mt-4 text-3xl font-bold text-blue-600">
            RondaKu
        </h1>

        <p class="mt-2 text-gray-500">
            Sistem Informasi Keamanan dan Jadwal Ronda
        </p>

    </div>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">

        @csrf

        {{-- Email --}}
        <div>

            <x-input-label
                for="email"
                :value="__('Email')" />

            <x-text-input
                id="email"
                class="block w-full mt-1"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Masukkan email" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        {{-- Password --}}
        <div class="mt-5">

            <x-input-label
                for="password"
                :value="__('Password')" />

            <x-text-input
                id="password"
                class="block w-full mt-1"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        {{-- Remember --}}
        <div class="flex items-center justify-between mt-5">

            <label
                for="remember_me"
                class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                    name="remember">

                <span class="ml-2 text-sm text-gray-600">
                    Remember Me
                </span>

            </label>

            @if (Route::has('password.request'))

            <a
                href="{{ route('password.request') }}"
                class="text-sm text-blue-600 hover:text-blue-700">

                Lupa Password?

            </a>

            @endif

        </div>

        {{-- Button --}}
        <div class="mt-8">

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow">

                Login

            </button>

        </div>

    </form>

</x-guest-layout>