<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="/manifest.webmanifest">

    <meta name="theme-color" content="#2563EB">

    <link rel="apple-touch-icon" href="/img/icon-192.png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#F8FAFC]">

    <div x-data="{ sidebarOpen: false, collapsed: false }" class="min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.navigation')

        {{-- Konten (header + main), digeser sesuai lebar sidebar di desktop --}}
        <div
            class="min-h-screen flex flex-col transition-all duration-300 ease-in-out"
            :class="collapsed ? 'lg:pl-20' : 'lg:pl-64'">

            {{-- Header --}}
            <header class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-[#E5E7EB] shadow-sm">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-3 min-w-0">

                            {{-- Hamburger (mobile only) --}}
                            <button
                                @click="sidebarOpen = true"
                                class="lg:hidden shrink-0 p-2 rounded-lg text-gray-500 hover:bg-[#F8FAFC] hover:text-[#2563EB] transition-colors duration-200"
                                aria-label="Buka menu">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>

                            @isset($header)
                            <div class="min-w-0 flex-1">
                                {{ $header }}
                            </div>
                            @endisset

                        </div>

                        {{-- Avatar + Dropdown Profil --}}
                        <div class="shrink-0">

                            <x-dropdown align="right" width="48">

                                <x-slot name="trigger">
                                    <button class="flex items-center gap-3 pl-2 pr-1 py-1 rounded-full hover:bg-[#F8FAFC] transition-colors duration-200">

                                        <div class="w-9 h-9 rounded-full bg-[#2563EB] text-white flex items-center justify-center font-semibold text-sm shrink-0">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>

                                        <div class="hidden sm:block text-left leading-tight">
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ Auth::user()->name }}
                                            </p>
                                            <p class="text-xs text-[#6B7280]">
                                                {{ ucfirst(Auth::user()->role) }}
                                            </p>
                                        </div>

                                        <svg class="hidden sm:block w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <div class="px-4 py-2 text-sm text-[#6B7280] border-b border-[#E5E7EB]">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </div>

                                    <x-dropdown-link :href="route('profile.edit')">
                                        Profil
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link
                                            :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            Logout
                                        </x-dropdown-link>
                                    </form>

                                </x-slot>

                            </x-dropdown>

                        </div>

                    </div>
                </div>
            </header>

            <main class="flex-1">
                {{ $slot }}
            </main>

        </div>

    </div>

    {{-- Script tambahan dari setiap halaman --}}
    @stack('scripts')
    <x-toast />
</body>

</html>