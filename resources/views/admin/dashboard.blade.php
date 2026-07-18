<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Card Selamat Datang -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">

                <h3 class="text-2xl font-bold text-gray-800">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h3>

                <p class="mt-2 text-gray-600">
                    Role :
                    <span class="font-semibold text-blue-600">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </p>

            </div>

            <!-- Menu -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Data Warga -->
                <a href="{{ route('warga.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow-md p-6 transition duration-300 hover:scale-105">

                    <div class="text-4xl mb-3">
                        👥
                    </div>

                    <h4 class="text-xl font-bold">
                        Data Warga
                    </h4>

                    <p class="mt-2 text-sm">
                        Kelola data seluruh warga.
                    </p>

                </a>

                <!-- Jadwal -->
                <a href="{{ route('jadwal.index') }}"
                    class="bg-green-500 hover:bg-green-600 text-white rounded-xl shadow-md p-6 transition duration-300 hover:scale-105">

                    <div class="text-4xl mb-3">
                        📅
                    </div>

                    <h4 class="text-xl font-bold">
                        Jadwal Ronda
                    </h4>

                    <p class="mt-2 text-sm">
                        Kelola jadwal ronda petugas.
                    </p>

                </a>

                <!-- Rekap Absensi -->
                <a href="{{ route('admin.absensi') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white rounded-xl shadow-md p-6 transition duration-300 hover:scale-105">

                    <div class="text-4xl mb-3">
                        📋
                    </div>

                    <h4 class="text-xl font-bold">
                        Rekap Absensi
                    </h4>

                    <p class="mt-2 text-sm">
                        Lihat seluruh data absensi.
                    </p>

                </a>

                <!-- Kelola User -->
                <a href="{{ route('user.index') }}"
                    class="bg-purple-500 hover:bg-purple-600 text-white rounded-xl shadow-md p-6 transition duration-300 hover:scale-105">

                    <div class="text-4xl mb-3">
                        👤
                    </div>

                    <h4 class="text-xl font-bold">
                        Kelola User
                    </h4>

                    <p class="mt-2 text-sm">
                        Tambah, edit, dan hapus akun petugas.
                    </p>

                </a>

            </div>

        </div>
    </div>
</x-app-layout>