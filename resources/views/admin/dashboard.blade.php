<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Dashboard Admin
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div
                class="relative overflow-hidden bg-gradient-to-r from-[#2563EB] to-indigo-700 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-6 sm:p-8 mb-6 text-white">

                {{-- Decorative shapes --}}
                <div class="pointer-events-none absolute -top-10 -right-10 w-56 h-56 bg-white/10 rounded-full blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-16 -left-10 w-56 h-56 bg-indigo-400/20 rounded-full blur-3xl"></div>

                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight">
                            Halo, {{ Auth::user()->name }}
                        </h2>
                        <p class="mt-2 text-sm sm:text-base text-blue-100">
                            Berikut ringkasan aktivitas Sistem Informasi RondaKu hari ini.
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="w-16 h-16 rounded-2xl bg-white/15 border border-white/20 backdrop-blur-sm flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-8 h-8"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.75"
                                    d="M5.121 17.804A9 9 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
                {{-- Warga --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-[#6B7280]">
                                Total Warga
                            </p>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">
                                {{ $jumlahWarga }}
                            </h2>
                        </div>
                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <x-heroicon-o-users class="w-6 h-6 text-[#2563EB]" />
                        </div>
                    </div>
                </div>

                {{-- Petugas --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-[#6B7280]">
                                Petugas
                            </p>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">
                                {{ $jumlahPetugas }}
                            </h2>
                        </div>
                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <x-heroicon-o-user-group class="w-6 h-6 text-emerald-600" />
                        </div>
                    </div>
                </div>

                {{-- Jadwal --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-[#6B7280]">
                                Jadwal
                            </p>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">
                                {{ $jadwalHariIni }}
                            </h2>
                        </div>
                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                            <x-heroicon-o-calendar-days class="w-6 h-6 text-amber-600" />
                        </div>
                    </div>
                </div>

                {{-- Absensi --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-[#6B7280]">
                                Total Absensi
                            </p>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">
                                {{ $absensiHariIni }}
                            </h2>
                        </div>
                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-rose-50 flex items-center justify-center">
                            <x-heroicon-o-check-badge class="w-6 h-6 text-rose-600" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Notifikasi --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6 mb-6">
                <div class="flex items-center gap-2 mb-5">
                    <x-heroicon-o-megaphone class="w-5 h-5 text-[#2563EB]" />
                    <h3 class="text-lg font-bold text-gray-900">
                        Notifikasi Dashboard
                    </h3>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#F8FAFC] transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-calendar-days class="w-5 h-5 text-[#2563EB]" />
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">
                                Hari ini ada <span class="text-[#2563EB] font-bold">{{ $jadwalHariIniNotif }}</span> jadwal ronda.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#F8FAFC] transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-600" />
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">
                                <span class="text-emerald-600 font-bold">{{ $hadirHariIni }}</span> petugas sudah melakukan absensi.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#F8FAFC] transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-rose-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-rose-600" />
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">
                                <span class="text-rose-600 font-bold">{{ $belumAbsenHariIni }}</span> petugas belum melakukan absensi.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#F8FAFC] transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-amber-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-bell class="w-5 h-5 text-amber-600" />
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">
                                Besok ada <span class="text-amber-600 font-bold">{{ $jadwalBesok }}</span> jadwal ronda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grafik & Timeline --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                {{-- Grafik --}}
                <div class="lg:col-span-2 bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Statistik Absensi
                            </h3>
                            <p class="text-sm text-[#6B7280]">
                                Data absensi 7 hari terakhir
                            </p>
                        </div>
                    </div>
                    <div class="h-56">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>
                {{-- Top 5 Petugas Terajin --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-bold text-gray-900">
                            Top 5 Petugas Terajin
                        </h3>
                    </div>
                    <p class="text-sm text-[#6B7280] -mt-3 mb-4">
                        Berdasarkan jumlah hadir
                    </p>
                    @forelse($topPetugas as $index => $petugas)
                    <div class="flex items-center justify-between py-3 border-b border-[#E5E7EB] last:border-0">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full
                    @if($index==0)
                        bg-amber-100 text-amber-600
                    @elseif($index==1)
                        bg-gray-100 text-gray-600
                    @elseif($index==2)
                        bg-orange-100 text-orange-600
                    @else
                        bg-blue-100 text-[#2563EB]
                    @endif
                    flex items-center justify-center font-bold">

                                {{ $index + 1 }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">
                                    {{ $petugas->name }}
                                </p>
                                <p class="text-sm text-[#6B7280]">
                                    Petugas
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-emerald-600">
                                {{ $petugas->total_hadir }}
                            </p>
                            <p class="text-xs text-[#6B7280]">
                                Hadir
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-[#6B7280]">
                        Belum ada data absensi.
                    </div>
                    @endforelse
                </div>

                {{-- Timeline --}}
                <div class="lg:col-span-3 bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6">

                    <div class="flex items-center justify-between mb-5">

                        <h3 class="text-lg font-semibold text-gray-900">
                            Aktivitas Terbaru
                        </h3>

                        <span class="inline-flex items-center gap-1.5 text-xs bg-blue-50 text-[#2563EB] px-2.5 py-1 rounded-full font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#2563EB] animate-pulse"></span>
                            Live
                        </span>

                    </div>

                    <div class="space-y-4 max-h-[420px] overflow-y-auto pr-1">

                        @forelse($activities as $activity)

                        <div class="flex gap-3 p-3 rounded-xl hover:bg-[#F8FAFC] transition-colors duration-200">

                            <div
                                class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">

                                <x-heroicon-o-bell
                                    class="w-5 h-5 text-[#2563EB]" />

                            </div>

                            <div class="flex-1 min-w-0">

                                <p class="font-medium text-gray-900 truncate">

                                    {{ $activity->user->name }}

                                </p>

                                <p class="text-sm text-[#6B7280]">

                                    {{ $activity->aktivitas }}

                                </p>

                                <span class="text-xs text-gray-400">

                                    {{ $activity->created_at->diffForHumans() }}

                                </span>

                            </div>

                        </div>

                        @empty

                        <div class="text-center py-12">

                            <div class="flex justify-center mb-3">
                                <x-heroicon-o-inbox class="w-12 h-12 text-gray-300" />
                            </div>

                            <p class="text-[#6B7280]">
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
                    class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col items-center text-center">

                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center mb-3">
                        <x-heroicon-o-users class="w-6 h-6 text-[#2563EB]" />
                    </div>

                    <h4 class="font-semibold text-gray-900">
                        Data Warga
                    </h4>

                    <span class="text-sm text-[#6B7280] mt-1">
                        Kelola warga
                    </span>

                </a>

                <a href="{{ route('user.index') }}"
                    class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col items-center text-center">

                    <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center mb-3">
                        <x-heroicon-o-user-group class="w-6 h-6 text-emerald-600" />
                    </div>

                    <h4 class="font-semibold text-gray-900">
                        Petugas
                    </h4>

                    <span class="text-sm text-[#6B7280] mt-1">
                        Kelola petugas
                    </span>

                </a>

                <a href="{{ route('jadwal.index') }}"
                    class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col items-center text-center">

                    <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center mb-3">
                        <x-heroicon-o-calendar-days class="w-6 h-6 text-amber-600" />
                    </div>

                    <h4 class="font-semibold text-gray-900">
                        Jadwal
                    </h4>

                    <span class="text-sm text-[#6B7280] mt-1">
                        Atur jadwal
                    </span>

                </a>

                <a href="{{ route('admin.absensi') }}"
                    class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col items-center text-center">

                    <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center mb-3">
                        <x-heroicon-o-clipboard-document-check class="w-6 h-6 text-rose-600" />
                    </div>

                    <h4 class="font-semibold text-gray-900">
                        Rekap
                    </h4>

                    <span class="text-sm text-[#6B7280] mt-1">
                        Data absensi
                    </span>

                </a>

            </div>

            {{-- Absensi Terbaru --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6">

                <div class="flex items-center justify-between mb-5">

                    <div>

                        <h3 class="text-lg font-semibold text-gray-900">
                            Absensi Terbaru
                        </h3>

                        <p class="text-sm text-[#6B7280]">
                            Riwayat absensi terbaru petugas
                        </p>

                    </div>

                    <a href="{{ route('admin.absensi') }}"
                        class="inline-flex items-center gap-1 text-[#2563EB] hover:text-[#1D4ED8] text-sm font-semibold transition-colors duration-200">

                        Lihat Semua
                        <x-heroicon-o-arrow-right class="w-4 h-4" />

                    </a>

                </div>

                <div class="overflow-x-auto rounded-xl border border-[#E5E7EB]">

                    <table class="w-full text-sm">

                        <thead class="bg-[#F8FAFC] sticky top-0">

                            <tr class="border-b border-[#E5E7EB]">

                                <th class="text-left py-3 px-4 text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    Petugas
                                </th>

                                <th class="text-left py-3 px-4 text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    Tanggal
                                </th>

                                <th class="text-center py-3 px-4 text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-[#E5E7EB]">

                            @forelse($recentAbsensi as $item)

                            <tr class="odd:bg-white even:bg-[#F8FAFC] hover:bg-blue-50/60 transition-colors duration-200">

                                <td class="py-3.5 px-4 font-medium text-gray-900">

                                    {{ $item->jadwal->petugas->name }}

                                </td>

                                <td class="py-3.5 px-4 text-[#6B7280]">

                                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d M Y') }}

                                </td>

                                <td class="py-3.5 px-4 text-center">

                                    @if($item->status == 'hadir')

                                    <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Hadir
                                    </span>

                                    @else

                                    <span class="inline-flex items-center bg-rose-50 text-rose-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Tidak Hadir
                                    </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="3" class="text-center py-10 text-[#6B7280]">

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