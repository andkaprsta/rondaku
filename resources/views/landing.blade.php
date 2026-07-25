<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RondaKu</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#F8FAFC] text-[#111827] antialiased overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-[#E5E7EB] shadow-sm">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center h-18 py-3">

                <div class="flex items-center gap-3">

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="w-11 h-11 object-contain"
                        alt="Logo">

                    <div>

                        <h1 class="text-xl font-bold tracking-tight text-[#2563EB] leading-none">

                            RondaKu

                        </h1>

                        <p class="text-xs text-[#6B7280]">

                            Sistem Informasi Ronda

                        </p>

                    </div>

                </div>

                <div class="hidden md:flex items-center gap-8">

                    <a href="#"
                        class="relative text-sm font-medium text-gray-600 hover:text-[#2563EB] transition-colors duration-300 group">

                        Beranda
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>

                    </a>

                    <a href="#jadwal"
                        class="relative text-sm font-medium text-gray-600 hover:text-[#2563EB] transition-colors duration-300 group">

                        Jadwal
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>

                    </a>

                    <a href="#informasi"
                        class="relative text-sm font-medium text-gray-600 hover:text-[#2563EB] transition-colors duration-300 group">

                        Informasi
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>

                    </a>

                </div>

                <div class="hidden md:flex items-center gap-3">

                    <a
                        href="{{ route('login') }}"
                        class="px-5 py-2.5 rounded-lg text-sm font-semibold border border-[#2563EB] text-[#2563EB] hover:bg-blue-50 transition-all duration-300">

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-5 py-2.5 rounded-lg text-sm font-semibold bg-[#2563EB] text-white shadow-sm hover:bg-[#1D4ED8] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                        Register

                    </a>

                </div>

                <!-- Mobile -->

                <div class="md:hidden">

                    <button
                        id="menuButton"
                        class="text-[#2563EB] p-2 rounded-lg hover:bg-blue-50 transition-colors duration-300"
                        aria-label="Buka menu">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                    </button>

                </div>

            </div>

        </div>

        <!-- Mobile Menu -->

        <div
            id="mobileMenu"
            class="hidden md:hidden border-t border-[#E5E7EB] bg-white">

            <div class="flex flex-col p-5 gap-1">

                <a href="#" class="px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-[#2563EB] transition-colors duration-300">
                    Beranda
                </a>

                <a href="#jadwal" class="px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-[#2563EB] transition-colors duration-300">
                    Jadwal
                </a>

                <a href="#informasi" class="px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-[#2563EB] transition-colors duration-300">
                    Informasi
                </a>

                <div class="flex flex-col gap-3 mt-3 pt-3 border-t border-[#E5E7EB]">

                    <a
                        href="{{ route('login') }}"
                        class="bg-[#2563EB] text-white py-2.5 rounded-lg text-center text-sm font-semibold hover:bg-[#1D4ED8] transition-colors duration-300">

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="border border-[#2563EB] text-[#2563EB] py-2.5 rounded-lg text-center text-sm font-semibold hover:bg-blue-50 transition-colors duration-300">

                        Register

                    </a>

                </div>

            </div>

        </div>

    </nav>

    <!-- ================= HERO ================= -->

    <section class="relative overflow-hidden bg-gradient-to-br from-[#2563EB] via-[#1D4ED8] to-indigo-800 text-white">

        <!-- Decorative gradient shapes -->
        <div class="pointer-events-none absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-indigo-400/20 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute top-1/3 right-1/4 w-64 h-64 bg-blue-300/10 rounded-full blur-2xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">

            <div class="grid lg:grid-cols-2 gap-14 items-center">

                <!-- Left -->

                <div>

                    <span
                        class="inline-flex items-center gap-2 bg-white/15 border border-white/20 px-4 py-2 rounded-full text-sm font-medium backdrop-blur-sm">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.75h-.152c-3.196 0-6.1-1.248-8.25-3.286z" />
                        </svg>

                        Sistem Informasi Keamanan Lingkungan

                    </span>

                    <h1
                        class="mt-6 text-4xl sm:text-5xl font-extrabold leading-tight tracking-tight">

                        Keamanan Lingkungan

                        <span class="block">

                            Dimulai Dari

                        </span>

                        <span class="text-yellow-300">

                            Kepedulian Bersama

                        </span>

                    </h1>

                    <p
                        class="mt-6 text-blue-100 text-lg leading-8 max-w-xl">

                        RondaKu membantu warga dalam mengelola
                        jadwal ronda, absensi petugas,
                        serta informasi keamanan lingkungan
                        secara digital.

                    </p>

                    <div
                        class="mt-10 flex flex-col sm:flex-row gap-4">

                        <a
                            href="#jadwal"
                            class="inline-flex items-center justify-center gap-2 bg-white text-[#1D4ED8] px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>

                            Lihat Jadwal

                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center justify-center gap-2 border border-white/70 px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-[#1D4ED8] transition-all duration-300">

                            Login Sekarang

                        </a>

                    </div>

                </div>

                <!-- Right -->

                <div
                    class="relative flex justify-center">

                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-72 h-72 sm:w-80 sm:h-80 bg-white/10 rounded-[3rem] rotate-6 backdrop-blur-sm border border-white/10"></div>
                    </div>

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="relative w-64 sm:w-80 drop-shadow-2xl"
                        alt="Logo">

                </div>

            </div>

        </div>

    </section>

    <!-- ================= STATISTIK ================= -->

    <section class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14">

                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900">

                    Statistik RondaKu

                </h2>

                <p class="mt-3 text-[#6B7280]">

                    Data diperbarui secara realtime dari sistem.

                </p>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>

                    </div>

                    <h3 class="text-3xl sm:text-4xl font-bold text-gray-900">

                        {{ $jumlahWarga }}

                    </h3>

                    <p class="mt-1 text-sm text-[#6B7280]">

                        Total Warga

                    </p>

                </div>

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.75h-.152c-3.196 0-6.1-1.248-8.25-3.286z" />
                        </svg>

                    </div>

                    <h3 class="text-3xl sm:text-4xl font-bold text-gray-900">

                        {{ $jumlahPetugas }}

                    </h3>

                    <p class="mt-1 text-sm text-[#6B7280]">

                        Petugas

                    </p>

                </div>

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>

                    </div>

                    <h3 class="text-3xl sm:text-4xl font-bold text-gray-900">

                        {{ $jumlahJadwal }}

                    </h3>

                    <p class="mt-1 text-sm text-[#6B7280]">

                        Jadwal

                    </p>

                </div>

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>

                    </div>

                    <h3 class="text-3xl sm:text-4xl font-bold text-gray-900">

                        {{ $jumlahAbsensi }}

                    </h3>

                    <p class="mt-1 text-sm text-[#6B7280]">

                        Absensi

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= JADWAL ================= -->

    <section
        id="jadwal"
        class="py-20 bg-[#F8FAFC]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14">

                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900">

                    Jadwal Ronda Minggu Ini

                </h2>

                <p class="mt-3 text-[#6B7280]">

                    Jadwal petugas ronda yang aktif.

                </p>

            </div>

            <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-[#E5E7EB]">

                <table class="min-w-full text-sm sm:text-base">

                    <thead class="bg-gradient-to-r from-[#2563EB] to-[#1D4ED8] text-white">

                        <tr>

                            <th class="px-6 py-4 text-left font-semibold whitespace-nowrap">

                                Hari

                            </th>

                            <th class="px-6 py-4 text-left font-semibold whitespace-nowrap">

                                Tanggal

                            </th>

                            <th class="px-6 py-4 text-left font-semibold whitespace-nowrap">

                                Petugas

                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-[#E5E7EB]">

                        @forelse($jadwalMinggu as $tanggal => $jadwals)

                        <tr class="odd:bg-white even:bg-[#F8FAFC] hover:bg-blue-50/60 transition-colors duration-200">

                            <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l') }}
                            </td>

                            <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex flex-wrap gap-2">

                                    @foreach($jadwals as $jadwal)

                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-[#1D4ED8] text-xs sm:text-sm font-medium">

                                        {{ $jadwal->petugas->name }}

                                    </span>

                                    @endforeach

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center py-10 text-[#6B7280]">

                                Belum ada jadwal ronda.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>

    <!-- ================= FITUR ================= -->

    <section id="informasi" class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">

                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900">

                    Kenapa Menggunakan RondaKu?

                </h2>

                <p class="mt-3 text-[#6B7280] max-w-2xl mx-auto">

                    Membantu pengelolaan keamanan lingkungan menjadi lebih mudah,
                    transparan, dan efisien.

                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">

                        Jadwal Digital

                    </h3>

                    <p class="text-sm text-[#6B7280] leading-relaxed">

                        Jadwal ronda tersusun otomatis dan dapat dilihat kapan saja.

                    </p>

                </div>

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">

                        Absensi Online

                    </h3>

                    <p class="text-sm text-[#6B7280] leading-relaxed">

                        Petugas dapat melakukan absensi langsung melalui website.

                    </p>

                </div>

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">

                        Laporan Lengkap

                    </h3>

                    <p class="text-sm text-[#6B7280] leading-relaxed">

                        Rekap absensi dan aktivitas dapat dipantau oleh admin.

                    </p>

                </div>

                <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="w-14 h-14 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">

                        Keamanan Data

                    </h3>

                    <p class="text-sm text-[#6B7280] leading-relaxed">

                        Seluruh data tersimpan dengan aman di dalam sistem.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= INFORMASI ================= -->

    <section class="py-20 bg-[#F8FAFC]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div>

                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900 mb-6">

                        Informasi Ronda

                    </h2>

                    <div class="space-y-4">

                        <div class="flex items-start gap-4 bg-white rounded-xl border border-[#E5E7EB] shadow-sm p-6 hover:shadow-md transition-shadow duration-300">

                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-50 text-[#2563EB] flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>

                            <div>

                                <h4 class="font-semibold text-gray-900">

                                    Jam Ronda

                                </h4>

                                <p class="mt-1 text-sm text-[#6B7280]">

                                    22.00 WIB - 04.00 WIB

                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4 bg-white rounded-xl border border-[#E5E7EB] shadow-sm p-6 hover:shadow-md transition-shadow duration-300">

                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-50 text-[#2563EB] flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>

                            </div>

                            <div>

                                <h4 class="font-semibold text-gray-900">

                                    Lokasi Pos

                                </h4>

                                <p class="mt-1 text-sm text-[#6B7280]">

                                    Pos Keamanan Lingkungan RT / RW

                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4 bg-white rounded-xl border border-[#E5E7EB] shadow-sm p-6 hover:shadow-md transition-shadow duration-300">

                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-50 text-[#2563EB] flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                                </svg>

                            </div>

                            <div>

                                <h4 class="font-semibold text-gray-900">

                                    Tujuan

                                </h4>

                                <p class="mt-1 text-sm text-[#6B7280] leading-relaxed">

                                    Menjaga keamanan, meningkatkan kepedulian warga,
                                    serta mempererat hubungan antar masyarakat.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="relative flex justify-center items-center">

                    <div class="absolute w-64 h-64 bg-blue-100/60 rounded-full blur-3xl"></div>

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="relative w-56 sm:w-72 opacity-90"
                        alt="Logo RondaKu">

                </div>

            </div>

        </div>

    </section>

    <!-- ================= FOOTER ================= -->

    <footer class="bg-[#0F1E3C] text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

            <div class="grid md:grid-cols-3 gap-10">

                <div>

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="w-14 mb-4">

                    <h3 class="text-xl font-bold">

                        RondaKu

                    </h3>

                    <p class="mt-3 text-blue-200 text-sm leading-relaxed max-w-xs">

                        Sistem Informasi Keamanan dan Jadwal Ronda
                        berbasis website.

                    </p>

                </div>

                <div>

                    <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-blue-200">

                        Menu

                    </h4>

                    <ul class="space-y-2 text-blue-100 text-sm">

                        <li>Beranda</li>

                        <li>Jadwal</li>

                        <li>Informasi</li>

                    </ul>

                </div>

                <div>

                    <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-blue-200">

                        Kontak

                    </h4>

                    <p class="text-blue-100 text-sm">

                        Email :
                        admin@rondaku.com

                    </p>

                    <p class="text-blue-100 text-sm mt-2">

                        Telp :
                        08xxxxxxxxxx

                    </p>

                </div>

            </div>

            <div class="border-t border-white/10 mt-10 pt-6 text-center text-blue-200 text-sm">

                © {{ date('Y') }} RondaKu.
                Semua Hak Dilindungi.

            </div>

        </div>

    </footer>

    <script>
        const button = document.getElementById('menuButton');

        const menu = document.getElementById('mobileMenu');

        button.addEventListener('click', () => {

            menu.classList.toggle('hidden');

        });
    </script>

</body>

</html>