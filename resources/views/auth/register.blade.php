
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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama --}}
        <div>

            <x-input-label
                for="name"
                :value="__('Nama')" />

            <x-text-input
                id="name"
                class="block w-full mt-1"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap" />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2" />

        </div>

        {{-- Email --}}
        <div class="mt-5">

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
                autocomplete="new-password"
                placeholder="Masukkan password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        {{-- Konfirmasi Password --}}
        <div class="mt-5">

            <x-input-label
                for="password_confirmation"
                :value="__('Konfirmasi Password')" />

            <x-text-input
                id="password_confirmation"
                class="block w-full mt-1"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password" />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2" />

        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-8">

            <a
                href="{{ route('login') }}"
                class="text-sm text-blue-600 hover:text-blue-700">

                Sudah punya akun?

            </a>

            <button
                type="submit"
                class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition shadow">

                Daftar

            </button>

        </div>

    </form>

</x-guest-layout>
