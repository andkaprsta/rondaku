<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Dashboard Admin
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Selamat datang kembali, {{ Auth::user()->name }} 👋
                </p>
            </div>

            <div class="text-right">
                <p class="text-sm text-gray-500">
                    {{ now()->translatedFormat('l') }}
                </p>

                <h3 class="font-semibold text-gray-700">
                    {{ now()->translatedFormat('d F Y') }}
                </h3>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Welcome Card --}}
            <div
                class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 p-6 mb-6 text-white">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold">
                            Halo, {{ Auth::user()->name }} 👋
                        </h2>
                        <p class="mt-2 text-sm sm:text-base text-blue-100">
                            Berikut ringkasan aktivitas Sistem Informasi RondaKu hari ini.
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-8 h-8"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5.121 17.804A9 9 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
                {{-- Warga --}}
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">
                                Total Warga
                            </p>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-2">
                                {{ $jumlahWarga }}
                            </h2>
                        </div>
                        <div
                            class="w-10 h-10 sm:w-11 sm:h-11 rounded-lg bg-blue-100 flex items-center justify-center">
                            <x-heroicon-o-users class="w-6 h-6 text-blue-600" />
                        </div>
                    </div>
                </div>

                {{-- Petugas --}}
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">
                                Petugas
                            </p>
                            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $jumlahPetugas }}
                            </h2>
                        </div>
                        <div
                            class="w-10 h-10 sm:w-11 sm:h-11 rounded-lg bg-green-100 flex items-center justify-center">
                            <x-heroicon-o-user-group class="w-6 h-6 text-green-600" />
                        </div>
                    </div>
                </div>

                {{-- Jadwal --}}
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">
                                Jadwal
                            </p>
                            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $jadwalHariIni }}
                            </h2>
                        </div>
                        <div
                            class="w-10 h-10 sm:w-11 sm:h-11 rounded-lg bg-yellow-100 flex items-center justify-center">
                            <x-heroicon-o-calendar-days class="w-6 h-6 text-yellow-600" />
                        </div>
                    </div>
                </div>

                {{-- Absensi --}}
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">
                                Total Absensi
                            </p>
                            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $absensiHariIni }}
                            </h2>
                        </div>
                        <div
                            class="w-10 h-10 sm:w-11 sm:h-11 rounded-lg bg-red-100 flex items-center justify-center">
                            <x-heroicon-o-check-badge class="w-6 h-6 text-red-600" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Notifikasi --}}
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-5">
                    📢 Notifikasi Dashboard
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                            📅
                        </div>
                        <div>
                            <p class="font-medium">
                                Hari ini ada <span class="text-blue-600 font-bold">{{ $jadwalHariIniNotif }}</span> jadwal ronda.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                            ✅
                        </div>
                        <div>
                            <p class="font-medium">
                                <span class="text-green-600 font-bold">{{ $hadirHariIni }}</span> petugas sudah melakukan absensi.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                            ⚠️
                        </div>
                        <div>
                            <p class="font-medium">
                                <span class="text-red-600 font-bold">{{ $belumAbsenHariIni }}</span> petugas belum melakukan absensi.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                            🔔
                        </div>
                        <div>
                            <p class="font-medium">
                                Besok ada <span class="text-yellow-600 font-bold">{{ $jadwalBesok }}</span> jadwal ronda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grafik & Timeline --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                {{-- Grafik --}}
                <div class="xl:col-span-2 bg-white rounded-xl shadow-sm p-5">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Statistik Absensi
                            </h3>
                            <p class="text-sm text-gray-500">
                                Data absensi 7 hari terakhir
                            </p>
                        </div>
                    </div>
                    <div class="h-56">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>
                {{-- Top 5 Petugas Terajin --}}
                <div class="bg-white rounded-xl shadow-sm border p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-bold text-gray-800">
                            🏆 Top 5 Petugas Terajin
                        </h3>
                        <span class="text-sm text-gray-400">
                            Berdasarkan jumlah hadir
                        </span>
                    </div>
                    @forelse($topPetugas as $index => $petugas)
                    <div class="flex items-center justify-between py-3 border-b last:border-0">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full
                    @if($index==0)
                        bg-yellow-100 text-yellow-600
                    @elseif($index==1)
                        bg-gray-100 text-gray-600
                    @elseif($index==2)
                        bg-orange-100 text-orange-600
                    @else
                        bg-blue-100 text-blue-600
                    @endif
                    flex items-center justify-center font-bold">

                                {{ $index + 1 }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $petugas->name }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Petugas
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-green-600">
                                {{ $petugas->total_hadir }}
                            </p>
                            <p class="text-xs text-gray-400">
                                Hadir
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-gray-500">
                        Belum ada data absensi.
                    </div>
                    @endforelse
                </div>

                {{-- Timeline --}}
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5">

                    <div class="flex items-center justify-between mb-5">

                        <h3 class="text-lg font-semibold text-gray-800">
                            Aktivitas Terbaru
                        </h3>

                        <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                            Live
                        </span>

                    </div>

                    <div class="space-y-5 max-h-[420px] overflow-y-auto">

                        @forelse($activities as $activity)

                        <div class="flex gap-3">

                            <div
                                class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">

                                <x-heroicon-o-bell
                                    class="w-5 h-5 text-blue-600" />

                            </div>

                            <div class="flex-1">

                                <p class="font-medium text-gray-800">

                                    {{ $activity->user->name }}

                                </p>

                                <p class="text-sm text-gray-500">

                                    {{ $activity->aktivitas }}

                                </p>

                                <span class="text-xs text-gray-400">

                                    {{ $activity->created_at->diffForHumans() }}

                                </span>

                            </div>

                        </div>

                        @empty

                        <div class="text-center py-12">

                            <div class="text-5xl mb-2">
                                📭
                            </div>

                            <p class="text-gray-500">
                                Belum ada aktivitas.
                            </p>

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- Quick Menu --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">

                <a href="{{ route('warga.index') }}"
                    class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5 flex flex-col items-center">

                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mb-3">
                        <x-heroicon-o-users class="w-6 h-6 text-blue-600" />
                    </div>

                    <h4 class="font-semibold text-gray-700">
                        Data Warga
                    </h4>

                    <span class="text-sm text-gray-500 mt-1">
                        Kelola warga
                    </span>

                </a>

                <a href="{{ route('user.index') }}"
                    class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5 flex flex-col items-center">

                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-3">
                        <x-heroicon-o-user-group class="w-6 h-6 text-green-600" />
                    </div>

                    <h4 class="font-semibold text-gray-700">
                        Petugas
                    </h4>

                    <span class="text-sm text-gray-500 mt-1">
                        Kelola petugas
                    </span>

                </a>

                <a href="{{ route('jadwal.index') }}"
                    class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5 flex flex-col items-center">

                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mb-3">
                        <x-heroicon-o-calendar-days class="w-6 h-6 text-yellow-600" />
                    </div>

                    <h4 class="font-semibold text-gray-700">
                        Jadwal
                    </h4>

                    <span class="text-sm text-gray-500 mt-1">
                        Atur jadwal
                    </span>

                </a>

                <a href="{{ route('admin.absensi') }}"
                    class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5 flex flex-col items-center">

                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mb-3">
                        <x-heroicon-o-clipboard-document-check class="w-6 h-6 text-red-600" />
                    </div>

                    <h4 class="font-semibold text-gray-700">
                        Rekap
                    </h4>

                    <span class="text-sm text-gray-500 mt-1">
                        Data absensi
                    </span>

                </a>

            </div>

            {{-- Absensi Terbaru --}}
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 p-5">

                <div class="flex items-center justify-between mb-5">

                    <div>

                        <h3 class="text-lg font-semibold text-gray-800">
                            Absensi Terbaru
                        </h3>

                        <p class="text-sm text-gray-500">
                            Riwayat absensi terbaru petugas
                        </p>

                    </div>

                    <a href="{{ route('admin.absensi') }}"
                        class="text-blue-600 hover:text-blue-700 text-sm font-semibold">

                        Lihat Semua →

                    </a>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b">

                                <th class="text-left py-3 text-sm text-gray-500">
                                    Petugas
                                </th>

                                <th class="text-left py-3 text-sm text-gray-500">
                                    Tanggal
                                </th>

                                <th class="text-center py-3 text-sm text-gray-500">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentAbsensi as $item)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="py-4 font-medium">

                                    {{ $item->jadwal->petugas->name }}

                                </td>

                                <td>

                                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d M Y') }}

                                </td>

                                <td class="text-center">

                                    @if($item->status == 'hadir')

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Hadir
                                    </span>

                                    @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Tidak Hadir
                                    </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="3" class="text-center py-8 text-gray-500">

                                    Belum ada data absensi.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    @push('scripts')

    <script>
        window.dashboardChartData = {
            labels: @json($labels),
            data: @json($data)
        };
    </script>

    @endpush
</x-app-layout>