<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold text-gray-800">

            Absensi Petugas

        </h2>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            {{-- Alert --}}
            @if(session('success'))

            <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 p-4">

                {{ session('success') }}

            </div>

            @endif

            @if(session('error'))

            <div class="mb-5 rounded-lg bg-red-100 border border-red-300 text-red-700 p-4">

                {{ session('error') }}

            </div>

            @endif

            <div class="bg-white rounded-xl shadow-lg p-5 md:p-8">

                @if($jadwal)

                <div class="mb-6">

                    <h3 class="text-xl font-semibold text-gray-700 mb-4">

                        Jadwal Hari Ini

                    </h3>

                    <div class="space-y-3">

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2 border-b pb-2">

                            <span class="text-gray-500">

                                Tanggal

                            </span>

                            <span class="font-semibold">

                                {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}

                            </span>

                        </div>

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2 border-b pb-2">

                            <span class="text-gray-500">

                                Petugas

                            </span>

                            <span class="font-semibold">

                                {{ Auth::user()->name }}

                            </span>

                        </div>

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2">

                            <span class="text-gray-500">

                                Status

                            </span>

                            @if($sudahAbsen)

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                Sudah Absen

                            </span>

                            @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                Belum Absen

                            </span>

                            @endif

                        </div>

                    </div>

                </div>

                <div class="text-center">

                    @if(!$sudahAbsen)

                    <form action="{{ route('absensi.store') }}" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg transition">

                            ✔ Absen Sekarang

                        </button>

                    </form>

                    @else

                    <button
                        disabled
                        class="w-full sm:w-auto bg-green-600 text-white px-8 py-3 rounded-lg cursor-not-allowed">

                        ✔ Anda Sudah Absen Hari Ini

                    </button>

                    @endif

                </div>

                @else

                <div class="text-center py-10">

                    <div class="text-5xl mb-4">

                        📅

                    </div>

                    <h3 class="text-xl font-bold text-gray-700">

                        Tidak Ada Jadwal Hari Ini

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Anda tidak memiliki jadwal ronda hari ini.

                    </p>

                </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>