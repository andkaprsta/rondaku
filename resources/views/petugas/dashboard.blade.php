<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                Dashboard Petugas

            </h2>

            <p class="text-sm text-gray-500 mt-1">

                Selamat datang di Sistem Informasi RondaKu.

            </p>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Welcome --}}
            <div class="bg-white rounded-xl shadow p-6 mb-6">

                <h2 class="text-2xl font-bold text-gray-800">

                    Halo,

                    <span class="text-blue-600">

                        {{ Auth::user()->name }}

                    </span>

                    👋

                </h2>

                <p class="text-gray-500 mt-2">

                    Selamat bertugas. Jangan lupa melakukan absensi sesuai jadwal ronda hari ini.

                </p>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Jadwal --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">

                                Jadwal Hari Ini

                            </p>

                            <h2 class="text-3xl font-bold text-blue-600 mt-2">

                                {{ $jadwalHariIni ? $jadwalHariIni->tanggal : '-' }}

                            </h2>

                        </div>

                        <div class="bg-blue-100 rounded-full p-3">

                            <x-heroicon-o-calendar-days class="w-8 h-8 text-blue-600" />

                        </div>

                    </div>

                </div>

                {{-- Status --}}
                <div class="bg-white rounded-xl shadow p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">

                                Status Hari Ini

                            </p>

                            @if($jadwalHariIni)

                            @if($sudahAbsen)

                            <h2 class="text-3xl font-bold text-green-600 mt-2">

                                Sudah Absen

                            </h2>

                            @else

                            <h2 class="text-3xl font-bold text-red-500 mt-2">

                                Belum Absen

                            </h2>

                            @endif

                            @else

                            <h2 class="text-3xl font-bold text-gray-500 mt-2">

                                Libur

                            </h2>

                            @endif

                        </div>

                        <div class="bg-green-100 rounded-full p-3">

                            <x-heroicon-o-check-badge class="w-8 h-8 text-green-600" />

                        </div>

                    </div>

                </div>

            </div>

            {{-- Jadwal Hari Ini --}}
            <div class="bg-white rounded-xl shadow p-6 mb-6">

                <h3 class="text-xl font-semibold text-gray-700 mb-5">

                    Jadwal Hari Ini

                </h3>

                @if($jadwalHariIni)

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <p class="text-gray-500">

                            Tanggal

                        </p>

                        <h4 class="font-bold text-lg mt-1">

                            {{ \Carbon\Carbon::parse($jadwalHariIni->tanggal)->translatedFormat('d F Y') }}

                        </h4>

                    </div>

                    <div>

                        <p class="text-gray-500">

                            Status

                        </p>

                        @if($sudahAbsen)

                        <span class="inline-block mt-2 px-4 py-2 rounded-full bg-green-100 text-green-700">

                            Sudah Absen

                        </span>

                        @else

                        <span class="inline-block mt-2 px-4 py-2 rounded-full bg-red-100 text-red-700">

                            Belum Absen

                        </span>

                        @endif

                    </div>

                </div>

                <div class="mt-6">

                    @if(!$sudahAbsen)

                    <a href="{{ route('absensi.index') }}"
                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">

                        <x-heroicon-o-check-circle class="w-5 h-5 mr-2" />

                        Absen Sekarang

                    </a>

                    @else

                    <button
                        disabled
                        class="bg-green-600 text-white px-6 py-3 rounded-lg cursor-not-allowed">

                        ✔ Sudah Absen

                    </button>

                    @endif

                </div>

                @else

                <div class="text-center py-8 text-gray-500">

                    Tidak ada jadwal ronda hari ini.

                </div>

                @endif

            </div>
            {{-- Riwayat & Statistik --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Riwayat Absensi --}}
                <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">

                    <div class="flex justify-between items-center mb-5">

                        <h3 class="text-xl font-semibold text-gray-700">

                            Riwayat Absensi Terakhir

                        </h3>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead class="border-b">

                                <tr>

                                    <th class="text-left py-3 text-gray-500">

                                        Tanggal

                                    </th>

                                    <th class="text-center py-3 text-gray-500">

                                        Status

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($riwayat as $item)

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="py-4">

                                        {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d F Y') }}

                                    </td>

                                    <td class="py-4 text-center">

                                        @if($item->status == 'hadir')

                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                            Hadir

                                        </span>

                                        @else

                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                            Tidak Hadir

                                        </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="2"
                                        class="text-center py-8 text-gray-500">

                                        Belum ada riwayat absensi.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                {{-- Statistik --}}
                <div class="space-y-6">

                    <div class="bg-white rounded-xl shadow p-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-gray-500 text-sm">

                                    Total Absensi

                                </p>

                                <h2 class="text-4xl font-bold text-blue-600 mt-2">

                                    {{ $totalAbsensi }}

                                </h2>

                            </div>

                            <div class="bg-blue-100 rounded-full p-3">

                                <x-heroicon-o-clipboard-document-check
                                    class="w-8 h-8 text-blue-600" />

                            </div>

                        </div>

                    </div>

                    <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-xl shadow p-6 text-white">

                        <h3 class="text-lg font-bold mb-2">

                            Semangat Bertugas 💪

                        </h3>

                        <p class="text-blue-100 text-sm leading-relaxed">

                            Terima kasih telah membantu menjaga keamanan lingkungan.
                            Pastikan selalu melakukan absensi sesuai jadwal ronda.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>