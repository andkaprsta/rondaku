<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex w-11 h-11 rounded-xl bg-blue-50 border border-blue-100 items-center justify-center flex-shrink-0">
                    <x-heroicon-o-shield-check class="w-6 h-6 text-[#2563EB]" />
                </div>
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                        Dashboard Admin
                    </h2>
                    <p class="text-sm text-slate-500 mt-0.5">
                        Kelola keamanan lingkungan dan pantau aktivitas ronda secara realtime.
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2.5 flex-wrap">
                <div class="inline-flex items-center gap-2 bg-white border border-slate-200 rounded-xl px-3.5 py-2 shadow-sm">
                    <x-heroicon-o-calendar-days class="w-4 h-4 text-[#2563EB]" />
                    <span id="dashHari" class="text-sm font-semibold text-slate-700">-</span>
                </div>
                <div class="inline-flex items-center gap-2 bg-white border border-slate-200 rounded-xl px-3.5 py-2 shadow-sm">
                    <x-heroicon-o-calendar class="w-4 h-4 text-[#2563EB]" />
                    <span id="dashTanggal" class="text-sm font-semibold text-slate-700">-</span>
                </div>
                <div class="inline-flex items-center gap-2 bg-[#2563EB] rounded-xl px-3.5 py-2 shadow-sm">
                    <x-heroicon-o-clock class="w-4 h-4 text-white" />
                    <span id="dashJam" class="text-sm font-mono font-bold text-white tabular-nums">--:--:--</span>
                    <span class="text-xs font-semibold text-blue-100">WIB</span>
                </div>

                {{-- Badge LIVE --}}
                <div class="inline-flex items-center gap-1.5 bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-2 shadow-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span class="text-xs font-bold text-emerald-700">LIVE</span>
                </div>

                {{-- Loading indicator --}}
                <div id="realtime-loading" class="hidden inline-flex items-center gap-1.5 text-xs text-slate-400">
                    <svg class="animate-spin h-4 w-4 text-[#2563EB]" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span>Memperbarui...</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 bg-[#F8FAFC] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome / Hero Card --}}
            <div class="relative overflow-hidden bg-gradient-to-br from-[#2563EB] via-blue-600 to-indigo-700 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 p-6 sm:p-8 mb-6 text-white">

                <div class="pointer-events-none absolute -top-16 -right-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-16 w-72 h-72 bg-indigo-400/20 rounded-full blur-3xl"></div>

                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            👋 Selamat Datang,
                        </p>
                        <h2 class="text-2xl sm:text-3xl font-bold tracking-tight mt-1">
                            {{ Auth::user()->name }}
                        </h2>
                        <p class="mt-3 text-sm sm:text-base text-blue-100 max-w-xl leading-relaxed">
                            Pantau aktivitas ronda malam, absensi petugas, dan keamanan lingkungan secara realtime melalui satu dashboard terpadu.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-3xl bg-white/15 border border-white/20 backdrop-blur-sm flex items-center justify-center">
                            <x-heroicon-o-shield-check class="w-11 h-11 sm:w-12 sm:h-12 text-white" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Alert Banner --}}
            @if($totalBelumHadir > 0)
            <div class="flex items-center gap-3 bg-amber-50 border border-amber-200 text-amber-800 rounded-2xl px-5 py-4 mb-6 shadow-sm">
                <div class="w-9 h-9 rounded-xl bg-amber-100 flex items-center justify-center flex-shrink-0">
                    <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-amber-600" />
                </div>
                <p class="text-sm font-medium">
                    Ada <span class="font-bold">{{ $totalBelumHadir }}</span> petugas yang belum melakukan absensi malam ini. Segera pantau melalui daftar di bawah.
                </p>
            </div>
            @else
            <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-5 py-4 mb-6 shadow-sm">
                <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                    <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-600" />
                </div>
                <p class="text-sm font-medium">
                    Semua petugas sudah melakukan absensi malam ini. Kerja bagus! 🎉
                </p>
            </div>
            @endif

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

                {{-- Petugas Hari Ini --}}
                <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Petugas Hari Ini
                            </p>
                            <h3 class="text-3xl font-bold text-slate-900 mt-2" id="total-petugas">
                                {{ $totalPetugasHariIni }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-1">Jadwal ronda terjadwal</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                            <x-heroicon-o-user-group class="w-6 h-6 text-[#2563EB]" />
                        </div>
                    </div>
                </div>

                {{-- Sudah Hadir --}}
                <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Sudah Hadir
                            </p>
                            <h3 class="text-3xl font-bold text-emerald-600 mt-2" id="total-hadir">
                                {{ $totalHadirHariIni }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-1">Petugas telah absen</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-600" />
                        </div>
                    </div>
                </div>

                {{-- Belum Hadir --}}
                <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Belum Hadir
                            </p>
                            <h3 class="text-3xl font-bold text-red-600 mt-2" id="total-belum">
                                {{ $totalBelumHadir }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-1">Perlu ditindaklanjuti</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-red-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                            <x-heroicon-o-x-circle class="w-6 h-6 text-red-600" />
                        </div>
                    </div>
                </div>

                {{-- Persentase --}}
                <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-6">
                    <div class="flex items-start justify-between">
                        <div class="w-full">
                            <p class="text-sm font-medium text-slate-500">
                                Persentase Kehadiran
                            </p>
                            <h3 class="text-3xl font-bold text-indigo-600 mt-2" id="persentase-hadir">
                                {{ $persentaseHadir }}%
                            </h3>
                            <div class="w-full h-2 bg-slate-100 rounded-full mt-3 overflow-hidden">
                                <div id="persentase-bar" class="h-full bg-gradient-to-r from-indigo-500 to-[#2563EB] rounded-full transition-all duration-500" style="width: {{ $persentaseHadir }}%"></div>
                            </div>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0 ml-3">
                            <x-heroicon-o-chart-bar class="w-6 h-6 text-indigo-600" />
                        </div>
                    </div>
                </div>

            </div>

            {{-- Grafik --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 p-6 sm:p-8 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">
                            Statistik Absensi
                        </h3>
                        <p class="text-sm text-slate-500 mt-0.5">
                            Data absensi 7 hari terakhir
                        </p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-chart-bar class="w-5 h-5 text-[#2563EB]" />
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="dashboardChart"></canvas>
                </div>
            </div>

            {{-- Aktivitas Terbaru & Petugas Belum Hadir --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

                {{-- Aktivitas Terbaru --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center justify-between p-6 border-b border-slate-100">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">
                                Aktivitas Terbaru
                            </h3>
                            <p class="text-sm text-slate-500 mt-0.5">
                                Log aktivitas sistem terkini
                            </p>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-clock class="w-5 h-5 text-[#2563EB]" />
                        </div>
                    </div>
                    <div class="divide-y divide-slate-100 max-h-[420px] overflow-y-auto" id="activity-list">
                        @forelse($activities as $log)
                        <div class="flex items-center gap-4 p-5 hover:bg-slate-50 transition-colors duration-200">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 text-[#2563EB] font-semibold text-sm">
                                {{ strtoupper(substr($log->user->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-slate-800 truncate">
                                    {{ $log->user->name }}
                                </h4>
                                <p class="text-sm text-slate-500 truncate">
                                    {{ $log->aktivitas }}
                                </p>
                            </div>
                            <span class="text-xs font-medium text-slate-400 flex-shrink-0">
                                {{ $log->created_at->format('H:i') }}
                            </span>
                        </div>
                        @empty
                        <div class="p-10 text-center text-slate-400 text-sm">
                            Belum ada aktivitas.
                        </div>
                        @endforelse
                    </div>
                </div>

                {{-- Petugas Belum Hadir --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center justify-between p-6 border-b border-slate-100">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">
                                Petugas Belum Hadir
                            </h3>
                            <p class="text-sm text-slate-500 mt-0.5">
                                Daftar petugas yang belum absen malam ini
                            </p>
                        </div>
                        <span id="belum-hadir-badge" class="px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold flex-shrink-0">
                            {{ $belumHadir->count() }} Orang
                        </span>
                    </div>
                    <div class="divide-y divide-slate-100 max-h-[420px] overflow-y-auto" id="belum-hadir-list">
                        @forelse($belumHadir as $jadwal)
                        <div class="flex items-center justify-between gap-3 p-5 hover:bg-slate-50 transition-colors duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <x-heroicon-o-user class="w-5 h-5 text-red-600" />
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-slate-800 truncate">
                                        {{ $jadwal->petugas->name }}
                                    </h4>
                                    <p class="text-sm text-slate-500">
                                        Belum melakukan absensi
                                    </p>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 rounded-full bg-red-50 text-red-600 text-xs font-semibold flex-shrink-0">
                                Belum Hadir
                            </span>
                        </div>
                        @empty
                        <div class="py-14 text-center px-6">
                            <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 flex items-center justify-center">
                                <x-heroicon-o-check-circle class="w-9 h-9 text-emerald-600" />
                            </div>
                            <h4 class="mt-4 font-bold text-emerald-700">
                                Semua Petugas Sudah Hadir
                            </h4>
                            <p class="text-sm text-slate-500 mt-1">
                                Tidak ada petugas yang belum melakukan absensi.
                            </p>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>

            {{-- Top Petugas --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 p-6 sm:p-8 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">
                            Top Petugas
                        </h3>
                        <p class="text-sm text-slate-500 mt-0.5">
                            Berdasarkan jumlah kehadiran terbanyak
                        </p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-trophy class="w-5 h-5 text-amber-500" />
                    </div>
                </div>

                <div class="space-y-2">
                    @forelse($topPetugas as $index => $petugas)
                    @php
                    $maxHadir = $topPetugas->max('total_hadir') ?: 1;
                    $barWidth = $maxHadir > 0 ? ($petugas->total_hadir / $maxHadir) * 100 : 0;
                    @endphp
                    <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors duration-200">
                        <div class="w-11 h-11 rounded-full flex items-center justify-center font-bold text-lg flex-shrink-0
                            @if($index == 0) bg-amber-100 text-amber-600
                            @elseif($index == 1) bg-slate-200 text-slate-600
                            @elseif($index == 2) bg-orange-100 text-orange-600
                            @else bg-blue-50 text-[#2563EB]
                            @endif">
                            @if($index == 0)
                            🥇
                            @elseif($index == 1)
                            🥈
                            @elseif($index == 2)
                            🥉
                            @else
                            {{ $index + 1 }}
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-slate-800 truncate">
                                {{ $petugas->name }}
                            </p>
                            <p class="text-xs text-slate-400 mb-1.5">Petugas</p>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-[#2563EB] to-indigo-500 rounded-full transition-all duration-500" style="width: {{ $barWidth }}%"></div>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0 pl-2">
                            <p class="text-xl font-bold text-emerald-600">
                                {{ $petugas->total_hadir }}
                            </p>
                            <p class="text-xs text-slate-400">
                                Hadir
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-10 text-slate-400 text-sm">
                        Belum ada data absensi.
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Quick Action --}}
            <div class="mb-6">
                <h3 class="text-lg font-bold text-slate-900 mb-4">
                    Aksi Cepat
                </h3>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                    <a href="{{ Route::has('admin.jadwal.index') ? route('admin.jadwal.index') : '#' }}"
                        class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-5 flex flex-col items-center text-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <x-heroicon-o-calendar-days class="w-6 h-6 text-[#2563EB]" />
                        </div>
                        <span class="text-sm font-semibold text-slate-700">
                            Kelola Jadwal
                        </span>
                    </a>

                    <a href="{{ Route::has('admin.petugas.index') ? route('admin.petugas.index') : '#' }}"
                        class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-5 flex flex-col items-center text-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <x-heroicon-o-user-group class="w-6 h-6 text-emerald-600" />
                        </div>
                        <span class="text-sm font-semibold text-slate-700">
                            Kelola Petugas
                        </span>
                    </a>

                    <a href="{{ Route::has('admin.warga.index') ? route('admin.warga.index') : '#' }}"
                        class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-5 flex flex-col items-center text-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <x-heroicon-o-home-modern class="w-6 h-6 text-indigo-600" />
                        </div>
                        <span class="text-sm font-semibold text-slate-700">
                            Kelola Warga
                        </span>
                    </a>

                    <a href="{{ Route::has('admin.laporan.index') ? route('admin.laporan.index') : '#' }}"
                        class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 p-5 flex flex-col items-center text-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <x-heroicon-o-document-chart-bar class="w-6 h-6 text-amber-600" />
                        </div>
                        <span class="text-sm font-semibold text-slate-700">
                            Lihat Laporan
                        </span>
                    </a>

                </div>
            </div>

            {{-- Notifikasi Dashboard --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 p-6 mb-6">
                <div class="flex items-center gap-2 mb-5">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-megaphone class="w-5 h-5 text-[#2563EB]" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">
                        Notifikasi Dashboard
                    </h3>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-calendar-days class="w-5 h-5 text-[#2563EB]" />
                        </div>
                        <div>
                            <p class="font-medium text-slate-700">
                                Hari ini ada <span class="text-[#2563EB] font-bold">{{ $jadwalHariIniNotif }}</span> jadwal ronda.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-600" />
                        </div>
                        <div>
                            <p class="font-medium text-slate-700">
                                <span class="text-emerald-600 font-bold">{{ $hadirHariIni }}</span> petugas sudah melakukan absensi.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-rose-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-rose-600" />
                        </div>
                        <div>
                            <p class="font-medium text-slate-700">
                                <span class="text-rose-600 font-bold">{{ $belumAbsenHariIni }}</span> petugas belum melakukan absensi.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors duration-200">
                        <div class="w-10 h-10 rounded-full bg-amber-50 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-bell class="w-5 h-5 text-amber-600" />
                        </div>
                        <div>
                            <p class="font-medium text-slate-700">
                                Besok ada <span class="text-amber-600 font-bold">{{ $jadwalBesok }}</span> jadwal ronda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Absensi Terbaru --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition-all duration-300 p-5 sm:p-6">

                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">
                            Absensi Terbaru
                        </h3>
                        <p class="text-sm text-slate-500 mt-0.5">
                            Riwayat absensi terbaru petugas
                        </p>
                    </div>

                    <a href="{{ route('admin.absensi') }}"
                        class="inline-flex items-center gap-1 text-[#2563EB] hover:text-[#1D4ED8] text-sm font-semibold transition-colors duration-200">
                        Lihat Semua
                        <x-heroicon-o-arrow-right class="w-4 h-4" />
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200">
                    <table class="w-full text-sm">
                        <thead class="bg-[#F8FAFC] sticky top-0">
                            <tr class="border-b border-slate-200">
                                <th class="text-left py-3 px-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Petugas
                                </th>
                                <th class="text-left py-3 px-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Tanggal
                                </th>
                                <th class="text-center py-3 px-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @forelse($recentAbsensi as $item)
                            <tr class="odd:bg-white even:bg-[#F8FAFC] hover:bg-blue-50/60 transition-colors duration-200">
                                <td class="py-3.5 px-4 font-medium text-slate-900">
                                    {{ $item->jadwal->petugas->name }}
                                </td>
                                <td class="py-3.5 px-4 text-slate-500">
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
                                <td colspan="3" class="text-center py-10 text-slate-500">
                                    Belum ada data absensi.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        @push('scripts')
        <script>
            window.dashboardChartData = {
                labels: @json($labels),
                data: @json($data)
            };

            (function() {
                const hariEl = document.getElementById('dashHari');
                const tanggalEl = document.getElementById('dashTanggal');
                const jamEl = document.getElementById('dashJam');

                function updateClock() {
                    const now = new Date();

                    if (hariEl) {
                        hariEl.textContent = now.toLocaleDateString('id-ID', {
                            weekday: 'long'
                        });
                    }
                    if (tanggalEl) {
                        tanggalEl.textContent = now.toLocaleDateString('id-ID', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });
                    }
                    if (jamEl) {
                        jamEl.textContent = now.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit',
                            hour12: false
                        });
                    }
                }

                updateClock();
                setInterval(updateClock, 1000);
            })();
        </script>

        <style>
            @keyframes rtFadeSlideDown {
                from {
                    opacity: 0;
                    transform: translateY(-14px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .rt-new-item {
                animation: rtFadeSlideDown 0.5s ease-out;
            }
        </style>

        <script>
            (function() {
                const POLL_INTERVAL = 10000; // 10 detik
                const dashboardDataUrl = "{{ route('admin.dashboard.data') }}";

                let knownActivityIds = new Set(@json($activities -> pluck('id')));
                const loadingEl = document.getElementById('realtime-loading');

                function showLoading() {
                    loadingEl && loadingEl.classList.remove('hidden');
                }

                function hideLoading() {
                    loadingEl && loadingEl.classList.add('hidden');
                }

                function escapeHtml(str) {
                    const div = document.createElement('div');
                    div.textContent = str ?? '';
                    return div.innerHTML;
                }

                // ===== Statistik =====
                function updateStats(d) {
                    const petugasEl = document.getElementById('total-petugas');
                    const hadirEl = document.getElementById('total-hadir');
                    const belumEl = document.getElementById('total-belum');
                    const persenEl = document.getElementById('persentase-hadir');
                    const barEl = document.getElementById('persentase-bar');
                    const badgeEl = document.getElementById('belum-hadir-badge');

                    if (petugasEl) petugasEl.textContent = d.petugas;
                    if (hadirEl) hadirEl.textContent = d.hadir;
                    if (belumEl) belumEl.textContent = d.belum;
                    if (persenEl) persenEl.textContent = d.persentase + '%';
                    if (barEl) barEl.style.width = d.persentase + '%';
                    if (badgeEl) badgeEl.textContent = d.belum + ' Orang';
                }

                // ===== Aktivitas Terbaru =====
                function renderActivityItem(log, isNew) {
                    const namaUser = log.user ? log.user.name : '-';
                    const initial = namaUser.charAt(0).toUpperCase();
                    const time = log.created_at ?
                        new Date(log.created_at).toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        }) :
                        '';

                    const wrapperClass = 'flex items-center gap-4 p-5 hover:bg-slate-50 transition-colors duration-200' +
                        (isNew ? ' rt-new-item' : '');

                    return `
                        <div class="${wrapperClass}">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 text-[#2563EB] font-semibold text-sm">
                                ${escapeHtml(initial)}
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-slate-800 truncate">${escapeHtml(namaUser)}</h4>
                                <p class="text-sm text-slate-500 truncate">${escapeHtml(log.aktivitas)}</p>
                            </div>
                            <span class="text-xs font-medium text-slate-400 flex-shrink-0">${time}</span>
                        </div>`;
                }

                function updateActivities(activities) {
                    const container = document.getElementById('activity-list');
                    if (!container) return;

                    if (!activities || !activities.length) {
                        container.innerHTML = '<div class="p-10 text-center text-slate-400 text-sm">Belum ada aktivitas.</div>';
                        knownActivityIds = new Set();
                        return;
                    }

                    container.innerHTML = activities
                        .map(log => renderActivityItem(log, !knownActivityIds.has(log.id)))
                        .join('');

                    knownActivityIds = new Set(activities.map(a => a.id));
                }

                // ===== Petugas Belum Hadir =====
                function renderBelumHadirItem(jadwal) {
                    const nama = jadwal.petugas ? jadwal.petugas.name : '-';
                    return `
                        <div class="flex items-center justify-between gap-3 p-5 hover:bg-slate-50 transition-colors duration-200 rt-new-item">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-slate-800 truncate">${escapeHtml(nama)}</h4>
                                    <p class="text-sm text-slate-500">Belum melakukan absensi</p>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 rounded-full bg-red-50 text-red-600 text-xs font-semibold flex-shrink-0">
                                Belum Hadir
                            </span>
                        </div>`;
                }

                function updateBelumHadir(list) {
                    const container = document.getElementById('belum-hadir-list');
                    if (!container) return;

                    if (!list || !list.length) {
                        container.innerHTML = `
                            <div class="py-14 text-center px-6">
                                <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 flex items-center justify-center">
                                    <svg class="w-9 h-9 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4 class="mt-4 font-bold text-emerald-700">Semua Petugas Sudah Hadir</h4>
                                <p class="text-sm text-slate-500 mt-1">Tidak ada petugas yang belum melakukan absensi.</p>
                            </div>`;
                        return;
                    }

                    container.innerHTML = list.map(renderBelumHadirItem).join('');
                }

                // ===== Polling =====
                async function pollDashboard() {
                    showLoading();
                    try {
                        const res = await fetch(dashboardDataUrl, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        });
                        if (!res.ok) throw new Error('Response tidak OK');

                        const json = await res.json();

                        updateStats(json);
                        updateActivities(json.activities);
                        updateBelumHadir(json.belumHadir);
                    } catch (err) {
                        console.error('Gagal memperbarui data dashboard:', err);
                    } finally {
                        hideLoading();
                    }
                }

                setInterval(pollDashboard, POLL_INTERVAL);
                // Tidak memanggil pollDashboard() langsung saat load agar data awal
                // dari Blade (server-render) tetap tampil sampai polling pertama di detik ke-10.
            })();
        </script>
        @endpush
    </div>
</x-app-layout>