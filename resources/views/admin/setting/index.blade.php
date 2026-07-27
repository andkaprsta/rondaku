<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Pengaturan Sistem
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Kelola konfigurasi dan pengaturan aplikasi RondaKu.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Section: Menu Pengaturan --}}
            <div>
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">
                    Menu Pengaturan
                </h3>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    {{-- Card QR Pos Ronda --}}
                    <a href="{{ route('setting.qr') }}"
                        class="group bg-white rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200">

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 group-hover:bg-blue-100 transition-colors">
                                <x-heroicon-o-qr-code class="w-6 h-6 text-blue-600" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                                    QR Pos Ronda
                                </h4>
                                <p class="text-sm text-gray-500 mt-0.5">
                                    Kelola QR absensi petugas ronda.
                                </p>
                                <span class="inline-flex items-center gap-1 mt-3 text-xs font-semibold text-blue-600">
                                    Kelola QR
                                    <x-heroicon-o-arrow-right class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" />
                                </span>
                            </div>
                        </div>

                    </a>

                </div>
            </div>

            {{-- Section: Informasi --}}
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-blue-600" />
                    </div>
                    <div>
                        <h4 class="font-semibold text-blue-900 text-sm">
                            Tentang QR Pos Ronda
                        </h4>
                        <p class="text-sm text-blue-700 mt-1 leading-relaxed">
                            QR Pos Ronda digunakan oleh seluruh petugas sebagai media absensi di lokasi ronda.
                            Tempelkan QR di pos ronda agar petugas dapat melakukan scan saat bertugas.
                            QR hanya berlaku pada jam operasional ronda (22.00–04.00 WIB).
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>