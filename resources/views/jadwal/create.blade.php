<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                Tambah Jadwal Ronda

            </h2>

            <p class="text-sm text-[#6B7280] mt-1">

                Tambahkan jadwal ronda baru.

            </p>

        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6 sm:p-8">

                <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-6">

                    @csrf

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Tanggal Ronda

                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ old('tanggal',$tanggal) }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                        @error('tanggal')
                        <p class="mt-1.5 text-sm text-rose-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Petugas

                        </label>

                        <select
                            name="petugas_id"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                            <option value="">

                                -- Pilih Petugas --

                            </option>

                            @foreach($petugas as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('petugas_id') == $item->id ? 'selected' : '' }}>

                                {{ $item->name }}

                            </option>

                            @endforeach

                        </select>

                        @error('petugas_id')
                        <p class="mt-1.5 text-sm text-rose-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-2">

                        <a href="{{ route('jadwal.index') }}"
                            class="w-full sm:w-auto text-center bg-white text-gray-700 border border-[#E5E7EB] px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#2563EB] text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:bg-[#1D4ED8] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                            <x-heroicon-o-check class="w-5 h-5" />
                            Simpan Jadwal

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>