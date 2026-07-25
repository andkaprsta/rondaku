<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold tracking-tight text-gray-900">

            Dashboard Petugas

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div class="relative overflow-hidden bg-gradient-to-r from-[#2563EB] to-indigo-700 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-6 sm:p-8 mb-6 text-white">

                {{-- Decorative shapes --}}
                <div class="pointer-events-none absolute -top-10 -right-10 w-56 h-56 bg-white/10 rounded-full blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-16 -left-10 w-56 h-56 bg-indigo-400/20 rounded-full blur-3xl"></div>

                <div class="relative">

                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-tight">

                        Halo, {{ Auth::user()->name }}

                    </h1>

                    <p class="mt-2 text-sm sm:text-base text-blue-100 max-w-xl">

                        Selamat datang di Sistem Informasi RondaKu.
                        Silakan lakukan absensi sesuai jadwal ronda Anda.

                    </p>

                </div>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-6">

                {{-- Hadir --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 sm:p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-[#6B7280]">

                                Total Hadir

                            </p>

                            <h2 class="text-2xl sm:text-3xl font-bold text-emerald-600 mt-2">

                                {{ $hadir }}

                            </h2>

                        </div>

                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-600" />
                        </div>

                    </div>

                </div>

                {{-- Tidak Hadir --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 sm:p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-[#6B7280]">

                                Tidak Hadir

                            </p>

                            <h2 class="text-2xl sm:text-3xl font-bold text-rose-600 mt-2">

                                {{ $tidakHadir }}

                            </h2>

                        </div>

                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-rose-50 flex items-center justify-center">
                            <x-heroicon-o-x-circle class="w-6 h-6 text-rose-600" />
                        </div>

                    </div>

                </div>

                {{-- Jadwal --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5 sm:p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-sm text-[#6B7280]">

                                Total Jadwal

                            </p>

                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">

                                {{ $jumlahJadwal }}

                            </h2>

                        </div>

                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <x-heroicon-o-calendar-days class="w-6 h-6 text-[#2563EB]" />
                        </div>

                    </div>

                </div>

            </div>

            {{-- Jadwal Hari Ini --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6 mb-6">

                <div class="flex items-center gap-2 mb-5">
                    <x-heroicon-o-calendar-days class="w-5 h-5 text-[#2563EB]" />
                    <h3 class="text-lg font-bold text-gray-900">

                        Jadwal Hari Ini

                    </h3>
                </div>

                @if($jadwalHariIni)

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <p class="text-sm text-[#6B7280]">

                            Tanggal

                        </p>

                        <h4 class="text-lg font-semibold text-gray-900">

                            {{ \Carbon\Carbon::parse($jadwalHariIni->tanggal)->translatedFormat('d F Y') }}

                        </h4>

                    </div>

                    <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold">

                        Ada Jadwal

                    </span>

                </div>

                @else

                <div class="bg-amber-50 text-amber-700 rounded-xl p-4 text-sm font-medium">

                    Tidak ada jadwal ronda hari ini.

                </div>

                @endif

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Grafik --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6">

                    <h3 class="text-lg font-bold text-gray-900 mb-4">

                        Statistik Absensi

                    </h3>

                    <div class="h-64">

                        <canvas id="chartAbsensiPetugas"></canvas>

                    </div>

                </div>

                {{-- Riwayat --}}
                <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 sm:p-6">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-4">

                        <h3 class="text-lg font-bold text-gray-900">

                            Riwayat Terbaru

                        </h3>

                        <a href="{{ route('petugas.riwayat') }}"
                            class="inline-flex items-center gap-1 text-sm text-[#2563EB] hover:text-[#1D4ED8] font-semibold self-start sm:self-auto transition-colors duration-200">

                            Lihat Semua
                            <x-heroicon-o-arrow-right class="w-4 h-4" />

                        </a>

                    </div>

                    @forelse($riwayat as $item)

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 border-b border-[#E5E7EB] last:border-0 py-3 px-2 -mx-2 rounded-lg hover:bg-[#F8FAFC] transition-colors duration-200">

                        <div>

                            <p class="font-semibold text-gray-900">

                                {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d F Y') }}

                            </p>

                        </div>

                        <div>

                            @if($item->status == 'hadir')

                            <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">

                                Hadir

                            </span>

                            @else

                            <span class="inline-flex items-center bg-rose-50 text-rose-700 px-3 py-1 rounded-full text-xs font-semibold">

                                Tidak Hadir

                            </span>

                            @endif

                        </div>

                    </div>

                    @empty

                    <div class="text-center text-[#6B7280] py-10">

                        Belum ada riwayat absensi.

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

    @push('scripts')

    <script>
        window.petugasLabels = @json($labels);
        window.petugasData = @json($data);
    </script>

    @endpush

</x-app-layout>