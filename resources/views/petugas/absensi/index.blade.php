<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold tracking-tight text-gray-900">

            Absensi Petugas

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if(session('success'))

            <div class="mb-5 flex items-center gap-2 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 text-sm font-medium">

                <x-heroicon-o-check-circle class="w-5 h-5 shrink-0" />

                {{ session('success') }}

            </div>

            @endif

            @if(session('error'))

            <div class="mb-5 flex items-center gap-2 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 px-5 py-4 text-sm font-medium">

                <x-heroicon-o-exclamation-triangle class="w-5 h-5 shrink-0" />

                {{ session('error') }}

            </div>

            @endif

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6 sm:p-8">

                @if($jadwal)

                <div class="mb-6">

                    <div class="flex items-center gap-2 mb-5">
                        <x-heroicon-o-calendar-days class="w-5 h-5 text-[#2563EB]" />
                        <h3 class="text-lg font-bold text-gray-900">

                            Jadwal Hari Ini

                        </h3>
                    </div>

                    <div class="space-y-3">

                        <div class="flex items-center justify-between gap-3 rounded-lg bg-[#F8FAFC] px-4 py-3">

                            <span class="text-sm text-[#6B7280]">

                                Tanggal

                            </span>

                            <span class="text-sm font-semibold text-gray-900">

                                {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}

                            </span>

                        </div>

                        <div class="flex items-center justify-between gap-3 rounded-lg bg-[#F8FAFC] px-4 py-3">

                            <span class="text-sm text-[#6B7280]">

                                Petugas

                            </span>

                            <span class="text-sm font-semibold text-gray-900">

                                {{ Auth::user()->name }}

                            </span>

                        </div>

                        <div class="flex items-center justify-between gap-3 rounded-lg bg-[#F8FAFC] px-4 py-3">

                            <span class="text-sm text-[#6B7280]">

                                Status

                            </span>

                            @if($sudahAbsen)

                            <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-3.5 py-1.5 rounded-full text-xs font-semibold">

                                Sudah Absen

                            </span>

                            @else

                            <span class="inline-flex items-center bg-rose-50 text-rose-700 px-3.5 py-1.5 rounded-full text-xs font-semibold">

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
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-8 py-3 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                            <x-heroicon-o-check class="w-5 h-5" />
                            Absen Sekarang

                        </button>

                    </form>

                    @else

                    <button
                        disabled
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-emerald-600 text-white px-8 py-3 rounded-lg text-sm font-semibold cursor-not-allowed opacity-90">

                        <x-heroicon-o-check-circle class="w-5 h-5" />
                        Anda Sudah Absen Hari Ini

                    </button>

                    @endif

                </div>

                @else

                <div class="text-center py-10">

                    <div class="flex justify-center mb-4">

                        <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#2563EB] flex items-center justify-center">
                            <x-heroicon-o-calendar-days class="w-8 h-8" />
                        </div>

                    </div>

                    <h3 class="text-lg font-bold text-gray-900">

                        Tidak Ada Jadwal Hari Ini

                    </h3>

                    <p class="text-sm text-[#6B7280] mt-2">

                        Anda tidak memiliki jadwal ronda hari ini.

                    </p>

                </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>