<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RondaKu</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50">

    <!-- ================= NAVBAR ================= -->

    <nav class="bg-white shadow-sm sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-3">

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="w-12 h-12 object-contain"
                        alt="Logo">

                    <div>

                        <h1 class="text-2xl font-bold text-blue-600">

                            RondaKu

                        </h1>

                        <p class="text-xs text-gray-500">

                            Sistem Informasi Ronda

                        </p>

                    </div>

                </div>

                <div class="hidden md:flex items-center gap-8">

                    <a href="#"
                        class="text-gray-600 hover:text-blue-600 transition">

                        Beranda

                    </a>

                    <a href="#jadwal"
                        class="text-gray-600 hover:text-blue-600 transition">

                        Jadwal

                    </a>

                    <a href="#informasi"
                        class="text-gray-600 hover:text-blue-600 transition">

                        Informasi

                    </a>

                </div>

                <div class="hidden md:flex gap-3">

                    <a
                        href="{{ route('login') }}"
                        class="px-5 py-2 rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">

                        Login

                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">

                        Register

                    </a>

                </div>

                <!-- Mobile -->

                <div class="md:hidden">

                    <button
                        id="menuButton"
                        class="text-blue-600">

                        ☰

                    </button>

                </div>

            </div>

        </div>

        <!-- Mobile Menu -->

        <div
            id="mobileMenu"
            class="hidden md:hidden border-t bg-white">

            <div class="flex flex-col p-5 gap-4">

                <a href="#">
                    Beranda
                </a>

                <a href="#jadwal">
                    Jadwal
                </a>

                <a href="#informasi">
                    Informasi
                </a>

                <a
                    href="{{ route('login') }}"
                    class="bg-blue-600 text-white py-2 rounded-lg text-center">

                    Login

                </a>

                <a
                    href="{{ route('register') }}"
                    class="border border-blue-600 text-blue-600 py-2 rounded-lg text-center">

                    Register

                </a>

            </div>

        </div>

    </nav>

    <!-- ================= HERO ================= -->

    <section
        class="bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700 text-white">

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">

            <div
                class="grid lg:grid-cols-2 gap-14 items-center">

                <!-- Left -->

                <div>

                    <span
                        class="bg-white/20 px-4 py-2 rounded-full text-sm">

                        🛡 Sistem Informasi Keamanan Lingkungan

                    </span>

                    <h1
                        class="mt-6 text-5xl font-extrabold leading-tight">

                        Keamanan Lingkungan

                        <span class="block">

                            Dimulai Dari

                        </span>

                        <span class="text-yellow-300">

                            Kepedulian Bersama

                        </span>

                    </h1>

                    <p
                        class="mt-6 text-blue-100 text-lg leading-8">

                        RondaKu membantu warga dalam mengelola
                        jadwal ronda, absensi petugas,
                        serta informasi keamanan lingkungan
                        secara digital.

                    </p>

                    <div
                        class="mt-10 flex flex-col sm:flex-row gap-4">

                        <a
                            href="#jadwal"
                            class="bg-white text-blue-700 px-8 py-4 rounded-xl font-semibold shadow hover:scale-105 transition">

                            📅 Lihat Jadwal

                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="border border-white px-8 py-4 rounded-xl hover:bg-white hover:text-blue-700 transition">

                            Login Sekarang

                        </a>

                    </div>

                </div>

                <!-- Right -->

                <div
                    class="flex justify-center">

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="w-80 drop-shadow-2xl animate-pulse"
                        alt="Logo">

                </div>

            </div>

        </div>

    </section>

    <!-- ================= STATISTIK ================= -->

    <section class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-bold text-gray-800">

                    Statistik RondaKu

                </h2>

                <p class="mt-3 text-gray-500">

                    Data diperbarui secara realtime dari sistem.

                </p>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-blue-50 rounded-2xl p-8 shadow hover:shadow-lg transition">

                    <div class="text-blue-600 text-5xl mb-3">

                        👥

                    </div>

                    <h3 class="text-4xl font-bold">

                        {{ $jumlahWarga }}

                    </h3>

                    <p class="mt-2 text-gray-600">

                        Total Warga

                    </p>

                </div>

                <div class="bg-green-50 rounded-2xl p-8 shadow hover:shadow-lg transition">

                    <div class="text-green-600 text-5xl mb-3">

                        🛡

                    </div>

                    <h3 class="text-4xl font-bold">

                        {{ $jumlahPetugas }}

                    </h3>

                    <p class="mt-2 text-gray-600">

                        Petugas

                    </p>

                </div>

                <div class="bg-yellow-50 rounded-2xl p-8 shadow hover:shadow-lg transition">

                    <div class="text-yellow-600 text-5xl mb-3">

                        📅

                    </div>

                    <h3 class="text-4xl font-bold">

                        {{ $jumlahJadwal }}

                    </h3>

                    <p class="mt-2 text-gray-600">

                        Jadwal

                    </p>

                </div>

                <div class="bg-red-50 rounded-2xl p-8 shadow hover:shadow-lg transition">

                    <div class="text-red-600 text-5xl mb-3">

                        ✔

                    </div>

                    <h3 class="text-4xl font-bold">

                        {{ $jumlahAbsensi }}

                    </h3>

                    <p class="mt-2 text-gray-600">

                        Absensi

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= JADWAL ================= -->

    <section
        id="jadwal"
        class="py-20 bg-slate-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-bold text-gray-800">

                    Jadwal Ronda Minggu Ini

                </h2>

                <p class="mt-3 text-gray-500">

                    Jadwal petugas ronda yang aktif.

                </p>

            </div>

            <div class="overflow-x-auto bg-white rounded-2xl shadow">

                <table class="min-w-full">

                    <thead class="bg-blue-600 text-white">

                        <tr>

                            <th class="px-6 py-4 text-left">

                                Hari

                            </th>

                            <th class="px-6 py-4 text-left">

                                Tanggal

                            </th>

                            <th class="px-6 py-4 text-left">

                                Petugas

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($jadwalMinggu as $tanggal => $jadwals)

                        <tr>

                            <td class="px-6 py-4 font-semibold">
                                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex flex-wrap gap-2">

                                    @foreach($jadwals as $jadwal)

                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">

                                        {{ $jadwal->petugas->name }}

                                    </span>

                                    @endforeach

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center py-8">

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

                <h2 class="text-4xl font-bold text-gray-800">

                    Kenapa Menggunakan RondaKu?

                </h2>

                <p class="mt-3 text-gray-500">

                    Membantu pengelolaan keamanan lingkungan menjadi lebih mudah,
                    transparan, dan efisien.

                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg transition">

                    <div class="w-16 h-16 rounded-xl bg-blue-100 flex items-center justify-center text-3xl mb-5">

                        📅

                    </div>

                    <h3 class="text-xl font-bold mb-3">

                        Jadwal Digital

                    </h3>

                    <p class="text-gray-600">

                        Jadwal ronda tersusun otomatis dan dapat dilihat kapan saja.

                    </p>

                </div>

                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg transition">

                    <div class="w-16 h-16 rounded-xl bg-green-100 flex items-center justify-center text-3xl mb-5">

                        ✔

                    </div>

                    <h3 class="text-xl font-bold mb-3">

                        Absensi Online

                    </h3>

                    <p class="text-gray-600">

                        Petugas dapat melakukan absensi langsung melalui website.

                    </p>

                </div>

                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg transition">

                    <div class="w-16 h-16 rounded-xl bg-yellow-100 flex items-center justify-center text-3xl mb-5">

                        📊

                    </div>

                    <h3 class="text-xl font-bold mb-3">

                        Laporan Lengkap

                    </h3>

                    <p class="text-gray-600">

                        Rekap absensi dan aktivitas dapat dipantau oleh admin.

                    </p>

                </div>

                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg transition">

                    <div class="w-16 h-16 rounded-xl bg-red-100 flex items-center justify-center text-3xl mb-5">

                        🔒

                    </div>

                    <h3 class="text-xl font-bold mb-3">

                        Keamanan Data

                    </h3>

                    <p class="text-gray-600">

                        Seluruh data tersimpan dengan aman di dalam sistem.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= INFORMASI ================= -->

    <section class="py-20 bg-slate-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-12">

                <div>

                    <h2 class="text-4xl font-bold text-gray-800 mb-6">

                        Informasi Ronda

                    </h2>

                    <div class="space-y-5">

                        <div class="bg-white rounded-xl shadow p-6">

                            <h4 class="font-semibold text-blue-600">

                                🕙 Jam Ronda

                            </h4>

                            <p class="mt-2 text-gray-600">

                                22.00 WIB - 04.00 WIB

                            </p>

                        </div>

                        <div class="bg-white rounded-xl shadow p-6">

                            <h4 class="font-semibold text-blue-600">

                                📍 Lokasi Pos

                            </h4>

                            <p class="mt-2 text-gray-600">

                                Pos Keamanan Lingkungan RT / RW

                            </p>

                        </div>

                        <div class="bg-white rounded-xl shadow p-6">

                            <h4 class="font-semibold text-blue-600">

                                📢 Tujuan

                            </h4>

                            <p class="mt-2 text-gray-600">

                                Menjaga keamanan, meningkatkan kepedulian warga,
                                serta mempererat hubungan antar masyarakat.

                            </p>

                        </div>

                    </div>

                </div>

                <div class="flex justify-center items-center">

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="w-72 opacity-90">

                </div>

            </div>

        </div>

    </section>

    <!-- ================= FOOTER ================= -->

    <footer class="bg-blue-700 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="grid md:grid-cols-3 gap-10">

                <div>

                    <img
                        src="{{ asset('img/logo-rondaku.png') }}"
                        class="w-16 mb-4">

                    <h3 class="text-2xl font-bold">

                        RondaKu

                    </h3>

                    <p class="mt-3 text-blue-100">

                        Sistem Informasi Keamanan dan Jadwal Ronda
                        berbasis website.

                    </p>

                </div>

                <div>

                    <h4 class="font-semibold mb-4">

                        Menu

                    </h4>

                    <ul class="space-y-2 text-blue-100">

                        <li>Beranda</li>

                        <li>Jadwal</li>

                        <li>Informasi</li>

                    </ul>

                </div>

                <div>

                    <h4 class="font-semibold mb-4">

                        Kontak

                    </h4>

                    <p class="text-blue-100">

                        Email :
                        admin@rondaku.com

                    </p>

                    <p class="text-blue-100 mt-2">

                        Telp :
                        08xxxxxxxxxx

                    </p>

                </div>

            </div>

            <div class="border-t border-blue-500 mt-10 pt-6 text-center text-blue-100">

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