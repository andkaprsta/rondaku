<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold text-gray-800">

            Dashboard Petugas

        </h2>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-2xl shadow-lg p-5 md:p-8 text-white mb-8 hover:shadow-xl transition-all duration-300">

                <h1 class="text-2xl md:text-3xl font-bold">

                    Halo, {{ Auth::user()->name }} 👋

                </h1>

                <p class="mt-2 text-blue-100">

                    Selamat datang di Sistem Informasi RondaKu.

                    Silakan lakukan absensi sesuai jadwal ronda Anda.

                </p>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                {{-- Hadir --}}
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-200 border-l-4 border-green-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">

                                Total Hadir

                            </p>

                            <h2 class="text-3xl md:text-4xl font-bold text-green-600 mt-2">

                                {{ $hadir }}

                            </h2>

                        </div>

                        <x-heroicon-o-check-circle class="w-14 h-14 text-green-500" />

                    </div>

                </div>

                {{-- Tidak Hadir --}}
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-200 border-l-4 border-red-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">

                                Tidak Hadir

                            </p>

                            <h2 class="text-3xl md:text-4xl font-bold text-red-500 mt-2">

                                {{ $tidakHadir }}

                            </h2>

                        </div>

                        <x-heroicon-o-x-circle class="w-14 h-14 text-red-500" />

                    </div>

                </div>

                {{-- Jadwal --}}
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-200 border-l-4 border-blue-500 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">

                                Total Jadwal

                            </p>

                            <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mt-2">

                                {{ $jumlahJadwal }}

                            </h2>

                        </div>

                        <x-heroicon-o-calendar-days class="w-14 h-14 text-blue-500" />

                    </div>

                </div>

            </div>

            {{-- Jadwal Hari Ini --}}
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">

                <h3 class="text-xl font-bold text-gray-700 mb-5">

                    Jadwal Hari Ini

                </h3>

                @if($jadwalHariIni)

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <p class="text-gray-500">

                            Tanggal

                        </p>

                        <h4 class="text-lg font-semibold">

                            {{ \Carbon\Carbon::parse($jadwalHariIni->tanggal)->translatedFormat('d F Y') }}

                        </h4>

                    </div>

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">

                        Ada Jadwal

                    </span>

                </div>

                @else

                <div class="bg-yellow-100 text-yellow-700 rounded-lg p-4">

                    Tidak ada jadwal ronda hari ini.

                </div>

                @endif

            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Grafik --}}
                <div class="bg-white rounded-xl shadow-lg p-6">

                    <h3 class="text-lg font-bold text-gray-700 mb-4">

                        Statistik Absensi

                    </h3>

                    <div class="h-64">

                        <canvas id="chartAbsensiPetugas"></canvas>

                    </div>

                </div>

                {{-- Riwayat --}}
                <div class="bg-white rounded-xl shadow-lg p-6">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-4">

                        <h3 class="text-lg font-bold text-gray-700">

                            Riwayat Terbaru

                        </h3>

                        <a href="{{ route('petugas.riwayat') }}"
                            class="text-sm text-blue-600 hover:text-blue-700 font-semibold self-start sm:self-auto">

                            Lihat Semua →

                        </a>

                    </div>

                    @forelse($riwayat as $item)

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 border-b py-3">

                        <div>

                            <p class="font-semibold">

                                {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d F Y') }}

                            </p>

                        </div>

                        <div>

                            @if($item->status == 'hadir')

                            <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">

                                Hadir

                            </span>

                            @else

                            <span class="bg-red-100 text-red-700 px-4 py-1 rounded-full text-sm">

                                Tidak Hadir

                            </span>

                            @endif

                        </div>

                    </div>

                    @empty

                    <div class="text-center text-gray-500 py-10">

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