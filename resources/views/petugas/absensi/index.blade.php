<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                <x-heroicon-o-shield-check class="w-6 h-6" />
            </div>
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Absensi Ronda
                </h2>
                <p class="text-sm text-[#64748B]">
                    Lakukan absensi sesuai jadwal ronda menggunakan QR Code Pos Ronda.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#F8FAFC] py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if(session('success'))

            <div class="mb-5 flex items-center gap-2 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 text-sm font-medium">

                <x-heroicon-o-check-circle class="w-5 h-5 shrink-0" />

                {{ session('success') }}

            </div>

            @endif

            @if(session('error'))

            <div class="mb-5 flex items-center gap-2 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 px-5 py-4 text-sm font-medium">

                <x-heroicon-o-x-circle class="w-5 h-5 shrink-0" />

                {{ session('error') }}

            </div>

            @endif

            @php
            $sekarang = \Carbon\Carbon::now('Asia/Jakarta');

            $bolehAbsen = ($sekarang->hour >= 22 || $sekarang->hour < 4);
                @endphp

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ============================= --}}
                {{-- LEFT COLUMN (LARGER) --}}
                {{-- ============================= --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- CARD 1 : COUNTDOWN --}}
                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 p-6 sm:p-8">

                        <div class="flex items-center gap-2 mb-5">
                            <x-heroicon-o-clock class="w-5 h-5 text-[#2563EB]" />
                            <h3 class="text-lg font-bold text-gray-900">
                                Waktu Absensi
                            </h3>
                        </div>

                        <div class="text-center">

                            <h3 id="statusAbsensi"
                                class="text-xl font-bold text-blue-600">
                            </h3>

                            <div id="countdown"
                                class="mt-5 text-5xl font-extrabold tracking-widest text-gray-900">
                                00:00:00
                            </div>

                        </div>

                        @if($jadwal)
                        <div class="text-center mt-8">

                            @if(!$sudahAbsen && $bolehAbsen)

                            <form action="{{ route('absensi.store') }}" method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-8 py-3 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                                    <x-heroicon-o-qr-code class="w-5 h-5" />

                                    Scan QR Absensi

                                </button>

                            </form>

                            @elseif(!$bolehAbsen)

                            <button
                                disabled
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gray-400 text-white px-8 py-3 rounded-lg text-sm font-semibold cursor-not-allowed">

                                <x-heroicon-o-lock-closed class="w-5 h-5" />

                                Absensi Dibuka Pukul 22.00 - 04.00 WIB

                            </button>

                            @else

                            <button
                                disabled
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-emerald-600 text-white px-8 py-3 rounded-lg text-sm font-semibold cursor-not-allowed opacity-90">

                                <x-heroicon-o-check-circle class="w-5 h-5" />

                                Sudah Absen

                            </button>

                            @endif

                        </div>
                        @endif

                    </div>

                    {{-- CARD 3 : INFORMASI JADWAL --}}
                    @if($jadwal)
                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 p-6 sm:p-8">

                        <div class="flex items-center gap-2 mb-5">
                            <x-heroicon-o-calendar-days class="w-5 h-5 text-[#2563EB]" />
                            <h3 class="text-lg font-bold text-gray-900">
                                Informasi Jadwal
                            </h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            <div class="rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] px-4 py-3">
                                <p class="text-xs text-[#64748B] mb-1">Tanggal Ronda</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                                </p>
                            </div>

                            <div class="rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] px-4 py-3">
                                <p class="text-xs text-[#64748B] mb-1">Petugas</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ Auth::user()->name }}
                                </p>
                            </div>

                            <div class="rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] px-4 py-3">
                                <p class="text-xs text-[#64748B] mb-1">Jam Absensi</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    22.00 - 04.00 WIB
                                </p>
                            </div>

                            <div class="rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] px-4 py-3 flex items-center justify-between">
                                <p class="text-xs text-[#64748B]">Status</p>
                                @if($sudahAbsen)
                                <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Sudah Absen
                                </span>
                                @else
                                <span class="inline-flex items-center bg-rose-50 text-rose-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Belum Absen
                                </span>
                                @endif
                            </div>

                        </div>

                    </div>
                    @endif

                </div>

                {{-- ============================= --}}
                {{-- RIGHT COLUMN (SMALLER) --}}
                {{-- ============================= --}}
                <div class="space-y-6">

                    {{-- CARD 2 : STATUS ABSENSI --}}
                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 p-6">

                        <h3 class="text-sm font-bold text-gray-900 mb-4">
                            Status Absensi
                        </h3>

                        @if(!$jadwal)

                        <div class="flex items-center gap-3 rounded-xl bg-amber-50 border border-amber-100 px-4 py-3">
                            <x-heroicon-o-exclamation-triangle class="w-6 h-6 text-amber-600 shrink-0" />
                            <div>
                                <p class="text-sm font-semibold text-amber-700">Tidak Ada Jadwal</p>
                                <p class="text-xs text-amber-600">Tidak memiliki jadwal ronda hari ini.</p>
                            </div>
                        </div>

                        @elseif($sudahAbsen)

                        <div class="flex items-center gap-3 rounded-xl bg-emerald-50 border border-emerald-100 px-4 py-3">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-600 shrink-0" />
                            <div>
                                <p class="text-sm font-semibold text-emerald-700">Absensi Berhasil</p>
                                <p class="text-xs text-emerald-600">Anda sudah melakukan absensi hari ini.</p>
                            </div>
                        </div>

                        @else

                        <div class="flex items-center gap-3 rounded-xl bg-rose-50 border border-rose-100 px-4 py-3">
                            <x-heroicon-o-qr-code class="w-6 h-6 text-rose-600 shrink-0" />
                            <div>
                                <p class="text-sm font-semibold text-rose-700">Belum Absen</p>
                                <p class="text-xs text-rose-600">Anda belum melakukan absensi.</p>
                            </div>
                        </div>

                        @endif

                    </div>

                    {{-- CARD 4 : PETUNJUK --}}
                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 p-6">

                        <div class="flex items-center gap-2 mb-4">
                            <x-heroicon-o-information-circle class="w-5 h-5 text-[#2563EB]" />
                            <h3 class="text-sm font-bold text-gray-900">
                                Petunjuk
                            </h3>
                        </div>

                        <ul class="space-y-3 text-sm text-[#64748B]">
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-qr-code class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                Scan QR di Pos Ronda.
                            </li>
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-clock class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                Absensi hanya pukul 22.00 - 04.00 WIB.
                            </li>
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-eye class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                Pastikan QR terlihat jelas.
                            </li>
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-check-badge class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                Absensi hanya dapat dilakukan sekali.
                            </li>
                        </ul>

                    </div>

                </div>

        </div>

        {{-- FALLBACK : TIDAK ADA JADWAL --}}
        @unless($jadwal)
        <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm p-10 text-center mt-6">

            <div class="flex justify-center mb-4">

                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#2563EB] flex items-center justify-center">
                    <x-heroicon-o-calendar-days class="w-8 h-8" />
                </div>

            </div>

            <h3 class="text-lg font-bold text-gray-900">
                Tidak Ada Jadwal Hari Ini
            </h3>

            <p class="text-sm text-[#64748B] mt-2">
                Anda tidak memiliki jadwal ronda hari ini.
            </p>

        </div>
        @endunless

    </div>
    </div>

    <script>
        const serverNow = new Date("{{ $serverTime }}").getTime();
        const clientNow = Date.now();
        const offset = serverNow - clientNow;

        function updateCountdown() {

            const now = new Date(Date.now() + offset);

            let open = new Date(now);
            open.setHours(22, 0, 0, 0);

            let close = new Date(open);
            close.setDate(close.getDate() + 1);
            close.setHours(4, 0, 0, 0);

            if (now.getHours() < 4) {
                open.setDate(open.getDate() - 1);
                close.setDate(close.getDate() - 1);
            }

            const status = document.getElementById("statusAbsensi");
            const timer = document.getElementById("countdown");

            if (now < open) {

                status.innerHTML = "Absensi dibuka dalam";
                status.className = "text-xl font-bold text-amber-600";

                render(open - now);

            } else if (now >= open && now < close) {

                status.innerHTML = "🟢 Absensi sedang dibuka";
                status.className = "text-xl font-bold text-green-600";

                render(close - now);

            } else {

                status.innerHTML = "🔴 Absensi ditutup";
                status.className = "text-xl font-bold text-red-600";

                timer.innerHTML = "00:00:00";

            }

        }

        function render(ms) {

            let total = Math.floor(ms / 1000);

            let h = Math.floor(total / 3600);

            let m = Math.floor((total % 3600) / 60);

            let s = total % 60;

            document.getElementById("countdown").innerHTML =

                String(h).padStart(2, '0') + ":"

                +
                String(m).padStart(2, '0') + ":"

                +
                String(s).padStart(2, '0');

        }

        setInterval(updateCountdown, 1000);

        updateCountdown();
    </script>

</x-app-layout>