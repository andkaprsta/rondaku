<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Welcome --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-2xl shadow-lg p-8 text-white mb-8">

                <h1 class="text-3xl font-bold">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h1>

                <p class="mt-2 text-blue-100">
                    Kelola seluruh aktivitas Sistem Informasi RondaKu dari dashboard ini.
                </p>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

                {{-- Data Warga --}}
                <a href="{{ route('warga.index') }}"
                    class="bg-white rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300 border-l-4 border-blue-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Data Warga
                            </p>

                            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                                {{ $jumlahWarga }}
                            </h2>

                        </div>

                        <div>
                            <x-heroicon-o-users class="w-14 h-14 text-blue-500" />
                        </div>

                    </div>

                </a>

                {{-- Petugas --}}
                <a href="{{ route('user.index') }}"
                    class="bg-white rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300 border-l-4 border-green-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Petugas
                            </p>

                            <h2 class="text-4xl font-bold text-green-600 mt-2">
                                {{ $jumlahPetugas }}
                            </h2>

                        </div>

                        <div>
                            <x-heroicon-o-user-group class="w-14 h-14 text-green-500" />
                        </div>

                    </div>

                </a>

                {{-- Jadwal --}}
                <a href="{{ route('jadwal.index') }}"
                    class="bg-white rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300 border-l-4 border-yellow-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Jadwal Hari Ini
                            </p>

                            <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                                {{ $jadwalHariIni }}
                            </h2>

                        </div>

                        <div>
                            <x-heroicon-o-calendar-days class="w-14 h-14 text-yellow-500" />
                        </div>
                    </div>

                </a>

                {{-- Absensi --}}
                <a href="{{ route('admin.absensi') }}"
                    class="bg-white rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300 border-l-4 border-red-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Absensi Hari Ini
                            </p>

                            <h2 class="text-4xl font-bold text-red-500 mt-2">
                                {{ $absensiHariIni }}
                            </h2>

                        </div>

                        <div>
                            <x-heroicon-o-check-badge class="w-14 h-14 text-red-500" />
                        </div>

                    </div>

                </a>

            </div>

            {{-- Menu Cepat --}}
            <div class="bg-white rounded-xl shadow-lg p-6">

                <h3 class="text-xl font-bold text-gray-700 mb-6">

                    Menu Cepat

                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                    <a href="{{ route('warga.index') }}"
                        class="bg-blue-500 hover:bg-blue-600 transition rounded-xl p-5 text-white">

                        <div class="flex items-center gap-3">

                            <x-heroicon-o-users class="w-7 h-7" />

                            <h4 class="text-lg font-bold">

                                Data Warga

                            </h4>

                        </div>
                        <p class="mt-2 text-sm">
                            Kelola seluruh data warga.
                        </p>

                    </a>

                    <a href="{{ route('user.index') }}"
                        class="bg-green-500 hover:bg-green-600 transition rounded-xl p-5 text-white">

                        <div class="flex items-center gap-3">

                            <x-heroicon-o-user-group class="w-7 h-7" />

                            <h4 class="text-lg font-bold">

                                Data User

                            </h4>

                        </div>
                        <p class="mt-2 text-sm">
                            Kelola akun petugas.
                        </p>

                    </a>

                    <a href="{{ route('jadwal.index') }}"
                        class="bg-yellow-500 hover:bg-yellow-600 transition rounded-xl p-5 text-white">

                        <div class="flex items-center gap-3">

                            <x-heroicon-o-calendar-days class="w-7 h-7" />

                            <h4 class="text-lg font-bold">

                                Jadwal Ronda

                            </h4>

                        </div>

                        <p class="mt-2 text-sm">
                            Atur jadwal ronda.
                        </p>

                    </a>

                    <a href="{{ route('admin.absensi') }}"
                        class="bg-red-500 hover:bg-red-600 transition rounded-xl p-5 text-white">

                        <div class="flex items-center gap-3">

                            <x-heroicon-o-clipboard-document-list class="w-7 h-7" />

                            <h4 class="text-lg font-bold">

                                Rekap Absensi

                            </h4>

                        </div>

                        <p class="mt-2 text-sm">
                            Lihat seluruh absensi petugas.
                        </p>

                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>