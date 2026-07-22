<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            Kalender Jadwal

        </h2>

    </x-slot>

    <div class="py-8">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow border p-4 md:p-5 overflow-x-auto">
                <div id="calendar"></div>
                <!-- Modal -->
                <div id="eventModal"
                    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

                    <div class="bg-white rounded-xl shadow-xl w-[95%] max-w-md p-5 md:p-6">

                        <h2 class="text-xl font-bold mb-5">
                            📅 Detail Jadwal
                        </h2>

                        <div class="space-y-3">

                            <p>
                                <strong>Petugas :</strong>
                                <span id="modalPetugas"></span>
                            </p>

                            <p>
                                <strong>Tanggal :</strong>
                                <span id="modalTanggal"></span>
                            </p>

                        </div>

                        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">

                            <button
                                id="btnDelete"
                                class="w-full sm:w-auto px-4 py-2 bg-red-600 text-white rounded-lg">

                                Hapus

                            </button>

                            <a
                                id="btnEdit"
                                class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg">

                                Edit

                            </a>

                            <button
                                id="btnClose"
                                class="w-full sm:w-auto px-4 py-2 bg-gray-300 rounded-lg">

                                Tutup

                            </button>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    @push('scripts')

    @vite('resources/js/calendar.js')

    @endpush

</x-app-layout>