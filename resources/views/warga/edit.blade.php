<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                Edit Warga

            </h2>

            <p class="text-sm text-[#6B7280] mt-1">

                Perbarui data warga.

            </p>

        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6 sm:p-8">

                <form
                    action="{{ route('warga.update',$warga->id) }}"
                    method="POST"
                    class="space-y-6">

                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama',$warga->nama) }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                        @error('nama')

                        <p class="mt-1.5 text-sm text-rose-600">

                            {{ $message }}

                        </p>

                        @enderror

                    </div>

                    {{-- Alamat --}}
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900 min-h-[120px]
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">{{ old('alamat',$warga->alamat) }}</textarea>

                        @error('alamat')

                        <p class="mt-1.5 text-sm text-rose-600">

                            {{ $message }}

                        </p>

                        @enderror

                    </div>

                    {{-- No HP --}}
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp',$warga->no_hp) }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                        @error('no_hp')

                        <p class="mt-1.5 text-sm text-rose-600">

                            {{ $message }}

                        </p>

                        @enderror

                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-2">

                        <a href="{{ route('warga.index') }}"
                            class="w-full sm:w-auto text-center bg-white text-gray-700 border border-[#E5E7EB] px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-amber-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:bg-amber-600 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                            <x-heroicon-o-pencil-square class="w-5 h-5" />
                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>