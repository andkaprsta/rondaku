<x-app-layout>

    {{-- ============================================================
         PRINT STYLES
         Hanya area #qr-printable yang tercetak
    ============================================================ --}}
    <style>
        @media print {

            /* Sembunyikan semua elemen */
            body * {
                visibility: hidden !important;
            }

            /* Tampilkan hanya area cetak */
            #qr-printable,
            #qr-printable * {
                visibility: visible !important;
            }

            /* Posisikan di tengah halaman A4 */
            #qr-printable {
                position: fixed !important;
                inset: 0 !important;
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                width: 100% !important;
                background: #ffffff !important;
            }

            /* Sembunyikan tombol aksi saat print */
            #action-buttons {
                display: none !important;
            }
        }
    </style>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">
                QR Code Pos Ronda
            </h2>
            <p class="mt-1 text-sm text-[#64748B]">
                QR Code ini digunakan oleh seluruh petugas ronda untuk melakukan absensi di Pos Ronda.
            </p>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F8FAFC] min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ============================================================
                 CARD UTAMA + AREA PRINT
            ============================================================ --}}
            <div id="qr-printable">

                {{-- Judul khusus print (tersembunyi di layar, tampil saat print) --}}
                <div class="hidden print:block text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 tracking-wide uppercase">
                        QR CODE POS RONDA
                    </h1>
                    <p class="text-sm text-gray-500 mt-2">
                        Scan QR ini untuk melakukan absensi petugas ronda.
                    </p>
                </div>

                {{-- Card Utama --}}
                <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">

                    {{-- Header Card --}}
                    <div class="bg-[#2563EB] px-8 py-6 text-center">
                        <div class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/20 mb-3">
                            <x-heroicon-o-shield-check class="w-6 h-6 text-white" />
                        </div>
                        <h1 class="text-2xl font-bold text-white tracking-widest">
                            RONDAKU
                        </h1>
                        <p class="text-blue-200 text-sm mt-1 font-medium">
                            Sistem Keamanan Lingkungan
                        </p>
                    </div>

                    {{-- Body Card --}}
                    <div class="p-8">

                        {{-- QR Code --}}
                        <div class="flex justify-center">
                            <div class="p-4 bg-white rounded-xl border-2 border-[#E2E8F0] shadow-inner inline-block">
                                {!! QrCode::size(280)->generate(route('petugas.absensi.qr', $setting->qr_token)) !!}
                            </div>
                        </div>

                        {{-- Label bawah QR --}}
                        <div class="mt-5 text-center">
                            <p class="text-base font-bold text-[#0F172A]">
                                QR Pos Ronda
                            </p>
                            <p class="text-sm text-[#64748B] mt-0.5">
                                Scan untuk melakukan absensi
                            </p>
                        </div>

                        {{-- Divider --}}
                        <div class="my-6 border-t border-[#E2E8F0]"></div>

                        {{-- Info singkat dalam card --}}
                        <div class="flex flex-col sm:flex-row justify-center gap-5 text-sm text-[#64748B]">
                            <div class="flex items-center gap-2">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 shrink-0" />
                                <span>Scan sebelum ronda dimulai</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <x-heroicon-o-clock class="w-5 h-5 text-blue-500 shrink-0" />
                                <span>Berlaku 22.00–04.00 WIB</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <x-heroicon-o-user-group class="w-5 h-5 text-indigo-500 shrink-0" />
                                <span>Semua petugas</span>
                            </div>
                        </div>

                    </div>

                    {{-- Footer Card --}}
                    <div class="bg-[#F8FAFC] border-t border-[#E2E8F0] px-8 py-4 text-center">
                        <p class="text-xs text-[#64748B]">
                            Tempelkan QR ini di Pos Ronda agar seluruh petugas dapat melakukan absensi.
                        </p>
                    </div>

                </div>

                {{-- Footer khusus print --}}
                <div class="hidden print:block text-center mt-8">
                    <p class="text-xs text-gray-400">
                        RondaKu &copy; {{ date('Y') }}
                    </p>
                </div>

            </div>
            {{-- /#qr-printable --}}

            {{-- ============================================================
                 KOTAK INFORMASI
            ============================================================ --}}
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">
                <div class="flex items-start gap-3">
                    <div class="shrink-0 w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-blue-600" />
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900 mb-2">
                            Informasi QR Code
                        </h4>
                        <ul class="space-y-1.5 text-sm text-blue-800">
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-400 shrink-0"></span>
                                QR Code ini berlaku untuk seluruh petugas.
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-400 shrink-0"></span>
                                QR tidak berubah setiap pergantian jadwal.
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-400 shrink-0"></span>
                                Petugas hanya dapat melakukan absensi pukul <span class="font-semibold">22.00–04.00 WIB</span>.
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-400 shrink-0"></span>
                                QR ini sebaiknya dicetak dan ditempel di Pos Ronda.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 TOMBOL AKSI
            ============================================================ --}}
            <div id="action-buttons" class="flex flex-col sm:flex-row gap-3">

                {{-- Tombol Print --}}
                <button
                    onclick="window.open('{{ route('setting.qr.print') }}')"
                    class="flex-1 inline-flex items-center justify-center gap-2
                           bg-[#2563EB] hover:bg-[#1D4ED8] active:scale-95
                           text-white font-semibold text-sm
                           rounded-xl px-5 py-3
                           shadow-sm hover:shadow-md
                           transition-all duration-200">
                    <x-heroicon-o-printer class="w-4 h-4" />
                    Cetak QR
                </button>


                <a href="{{ route('setting.qr.download') }}"
                    class="flex-1 inline-flex items-center justify-center gap-2
                            bg-emerald-600 hover:bg-emerald-700
                            text-white rounded-xl px-5 py-3">

                            <x-heroicon-o-arrow-down-tray class="w-5 h-5" />

                                Download QR
               </a>
               
                {{-- Tombol Kembali --}}
                <a href="{{ route('setting.index') }}"
                    class="flex-1 inline-flex items-center justify-center gap-2
                           bg-white hover:bg-gray-50 active:scale-95
                           text-[#0F172A] font-semibold text-sm
                           rounded-xl px-5 py-3
                           border border-[#E2E8F0] hover:border-gray-300
                           shadow-sm hover:shadow-md
                           transition-all duration-200">
                    <x-heroicon-o-arrow-left class="w-4 h-4" />
                    Kembali
                </a>

            </div>

        </div>
    </div>

</x-app-layout>