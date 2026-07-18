<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl">
            Dashboard Petugas
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">

            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-2xl font-bold">

                    Halo, {{ Auth::user()->name }} 👋

                </h2>

                <p class="text-gray-600 mt-2">

                    Hari ini:
                    {{ \Carbon\Carbon::today()->translatedFormat('l, d F Y') }}

                </p>

                <hr class="my-5">

                @if($jadwal)

                <div class="bg-green-100 border border-green-400 rounded-lg p-4">

                    <h3 class="text-xl font-bold text-green-700">

                        ✅ Anda mendapat jadwal ronda hari ini

                    </h3>

                    <p class="mt-2">

                        Tanggal:

                        <strong>

                            {{ $jadwal->tanggal }}

                        </strong>

                    </p>

                    @if($sudahAbsen)

                    <div class="mt-4">

                        <span
                            class="bg-green-600 text-white px-4 py-2 rounded">

                            Sudah Absen

                        </span>

                    </div>

                    @else

                    <div class="mt-4">

                        <a
                            href="{{ route('absensi.index') }}"
                            class="bg-blue-600 text-white px-5 py-2 rounded">

                            Absen Sekarang

                        </a>

                    </div>

                    @endif

                </div>

                @else

                <div class="bg-red-100 border border-red-400 rounded-lg p-4">

                    <h3 class="text-xl font-bold text-red-700">

                        ❌ Hari ini Anda tidak mendapat jadwal ronda.

                    </h3>

                </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>