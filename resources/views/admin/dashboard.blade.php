<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Dashboard Admin

                </h2>

                <p class="text-sm text-gray-500 mt-1">

                    Ringkasan aktivitas Sistem Informasi RondaKu.

                </p>

            </div>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Welcome --}}
            <div class="bg-white rounded-xl shadow p-6 mb-6">

                <h2 class="text-2xl font-bold text-gray-800">

                    Selamat Datang,
                    <span class="text-blue-600">

                        {{ Auth::user()->name }}

                    </span>
                    👋

                </h2>

                <p class="text-gray-500 mt-2">

                    Semoga harimu menyenangkan. Berikut ringkasan data RondaKu hari ini.

                </p>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

                <a href="{{ route('warga.index') }}"
                    class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-gray-500">

                                Data Warga

                            </p>

                            <h2 class="text-3xl font-bold text-blue-600 mt-2">

                                {{ $jumlahWarga }}

                            </h2>

                        </div>

                        <div class="bg-blue-100 rounded-full p-3">

                            <x-heroicon-o-users class="w-7 h-7 text-blue-600" />

                        </div>

                    </div>

                </a>

                <a href="{{ route('user.index') }}"
                    class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-gray-500">

                                Petugas

                            </p>

                            <h2 class="text-3xl font-bold text-green-600 mt-2">

                                {{ $jumlahPetugas }}

                            </h2>

                        </div>

                        <div class="bg-green-100 rounded-full p-3">

                            <x-heroicon-o-user-group class="w-7 h-7 text-green-600" />

                        </div>

                    </div>

                </a>

                <a href="{{ route('jadwal.index') }}"
                    class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-gray-500">

                                Jadwal Hari Ini

                            </p>

                            <h2 class="text-3xl font-bold text-yellow-500 mt-2">

                                {{ $jadwalHariIni }}

                            </h2>

                        </div>

                        <div class="bg-yellow-100 rounded-full p-3">

                            <x-heroicon-o-calendar-days class="w-7 h-7 text-yellow-600" />

                        </div>

                    </div>

                </a>

                <a href="{{ route('admin.absensi') }}"
                    class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-gray-500">

                                Absensi Hari Ini

                            </p>

                            <h2 class="text-3xl font-bold text-red-500 mt-2">

                                {{ $absensiHariIni }}

                            </h2>

                        </div>

                        <div class="bg-red-100 rounded-full p-3">

                            <x-heroicon-o-check-badge class="w-7 h-7 text-red-600" />

                        </div>

                    </div>

                </a>

            </div>

            {{-- Grafik + Aktivitas --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

                {{-- Grafik --}}
                <div class="bg-white rounded-xl shadow p-5">

                    <h3 class="text-lg font-semibold text-gray-700 mb-4">

                        Grafik Absensi

                    </h3>

                    <p class="text-sm text-gray-500 mb-4">

                        7 Hari Terakhir

                    </p>

                    <div class="h-64">

                        <canvas id="absensiChart"></canvas>

                    </div>

                </div>
                {{-- Aktivitas Terbaru --}}
                <div class="xl:col-span-2 bg-white rounded-xl shadow p-5">

                    <div class="flex justify-between items-center mb-5">

                        <div>

                            <h3 class="text-lg font-semibold text-gray-700">

                                Aktivitas Terbaru

                            </h3>

                            <p class="text-sm text-gray-500">

                                5 absensi terakhir petugas

                            </p>

                        </div>

                        <a href="{{ route('admin.absensi') }}"
                            class="text-blue-600 hover:text-blue-700 text-sm font-medium">

                            Lihat Semua →

                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead class="border-b">

                                <tr>

                                    <th class="text-left py-3 text-gray-500">

                                        Petugas

                                    </th>

                                    <th class="text-left py-3 text-gray-500">

                                        Tanggal

                                    </th>

                                    <th class="text-center py-3 text-gray-500">

                                        Status

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($absensiTerbaru as $item)

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="py-4 font-medium">

                                        {{ $item->jadwal->petugas->name }}

                                    </td>

                                    <td class="py-4 text-gray-600">

                                        {{ $item->created_at->format('d M Y H:i') }}

                                    </td>

                                    <td class="py-4 text-center">

                                        @if($item->status=='hadir')

                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">

                                            Hadir

                                        </span>

                                        @else

                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">

                                            Tidak Hadir

                                        </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="3"
                                        class="py-8 text-center text-gray-500">

                                        Belum ada data absensi.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            {{-- Menu Cepat --}}
            <div class="bg-white rounded-xl shadow p-6">

                <h3 class="text-lg font-semibold text-gray-700 mb-5">

                    Menu Cepat

                </h3>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                    <a href="{{ route('warga.index') }}"
                        class="border rounded-xl p-5 hover:bg-blue-50 transition">

                        <x-heroicon-o-users
                            class="w-8 h-8 text-blue-600 mb-3" />

                        <h4 class="font-semibold">

                            Data Warga

                        </h4>

                    </a>

                    <a href="{{ route('user.index') }}"
                        class="border rounded-xl p-5 hover:bg-green-50 transition">

                        <x-heroicon-o-user-group
                            class="w-8 h-8 text-green-600 mb-3" />

                        <h4 class="font-semibold">

                            Data User

                        </h4>

                    </a>

                    <a href="{{ route('jadwal.index') }}"
                        class="border rounded-xl p-5 hover:bg-yellow-50 transition">

                        <x-heroicon-o-calendar-days
                            class="w-8 h-8 text-yellow-500 mb-3" />

                        <h4 class="font-semibold">

                            Jadwal

                        </h4>

                    </a>

                    <a href="{{ route('admin.absensi') }}"
                        class="border rounded-xl p-5 hover:bg-red-50 transition">

                        <x-heroicon-o-clipboard-document-list
                            class="w-8 h-8 text-red-500 mb-3" />

                        <h4 class="font-semibold">

                            Rekap Absensi

                        </h4>

                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- Data untuk Chart --}}
    <script>
        window.dashboardChartData = @json([
            'labels' => $labels,
            'data' => $data,
        ]);
        
    </script>

</x-app-layout>