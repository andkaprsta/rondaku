<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">
            QR Pos Ronda
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-xl mx-auto">

            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

                <div class="bg-[#2563EB] text-white text-center py-6">

                    <h1 class="text-2xl font-bold">

                        RONDAKU

                    </h1>

                    <p class="text-blue-100 mt-1">

                        QR Pos Ronda

                    </p>

                </div>

                <div class="p-8">

                    <div class="flex justify-center">

                        {!! QrCode::size(300)->generate(route('petugas.absensi.qr', $setting->qr_token)) !!}
                    </div>

                    <div class="mt-8 space-y-3">

                        <div class="flex items-center gap-2 text-sm text-gray-600">

                            <x-heroicon-o-check-circle class="w-5 h-5 text-green-600" />

                            Scan QR sebelum melakukan ronda.

                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-600">

                            <x-heroicon-o-clock class="w-5 h-5 text-blue-600" />

                            Berlaku pukul 22.00 - 04.00 WIB.

                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-600">

                            <x-heroicon-o-user-group class="w-5 h-5 text-indigo-600" />

                            Digunakan oleh seluruh petugas ronda.

                        </div>

                    </div>

                    <div class="mt-8 border-t pt-6">

                        <div class="text-center">

                            <p class="text-xs text-gray-400">

                                Tempelkan QR ini di Pos Ronda agar seluruh petugas dapat melakukan absensi.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>