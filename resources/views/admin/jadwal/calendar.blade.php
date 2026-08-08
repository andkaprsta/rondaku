<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold tracking-tight text-gray-900">

            Kalender Jadwal

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-4 md:p-6 overflow-x-auto">

                <div id="calendar"></div>

                {{-- Modal --}}
                <div id="eventModal"
                    class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">

                    <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-xl w-[95%] max-w-md p-6">

                        <div class="flex items-center gap-2 mb-5">

                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                                <x-heroicon-o-calendar-days class="w-5 h-5" />
                            </div>

                            <h2 class="text-lg font-bold text-gray-900">
                                Detail Jadwal
                            </h2>

                        </div>

                        <div class="space-y-3">

                            <div class="flex items-center justify-between gap-3 rounded-lg bg-[#F8FAFC] px-4 py-3">
                                <span class="text-sm text-[#6B7280]">Petugas</span>
                                <span id="modalPetugas" class="text-sm font-semibold text-gray-900"></span>
                            </div>

                            <div class="flex items-center justify-between gap-3 rounded-lg bg-[#F8FAFC] px-4 py-3">
                                <span class="text-sm text-[#6B7280]">Tanggal</span>
                                <span id="modalTanggal" class="text-sm font-semibold text-gray-900"></span>
                            </div>

                        </div>

                        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">

                            <button
                                id="btnDelete"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300">

                                <x-heroicon-o-trash class="w-4 h-4" />
                                Hapus

                            </button>

                            <a
                                id="btnEdit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300">

                                <x-heroicon-o-pencil-square class="w-4 h-4" />
                                Edit

                            </a>

                            <button
                                id="btnClose"
                                class="w-full sm:w-auto px-4 py-2.5 bg-white text-gray-700 border border-[#E5E7EB] rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300">

                                Tutup

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>