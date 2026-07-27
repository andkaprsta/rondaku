<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">
            Pengaturan Sistem
        </h2>

    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">

            <div class="grid md:grid-cols-2 gap-6">

                <a href="{{ route('setting.qr') }}"
                    class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm hover:shadow-lg transition">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">

                            <x-heroicon-o-qr-code class="w-8 h-8 text-blue-600" />

                        </div>

                        <div>

                            <h3 class="font-bold text-lg">

                                QR Pos Ronda

                            </h3>

                            <p class="text-sm text-gray-500">

                                Kelola QR absensi petugas ronda.

                            </p>

                        </div>

                    </div>

                </a>

            </div>

        </div>

    </div>

</x-app-layout>