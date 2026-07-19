<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                Tambah Warga

            </h2>

            <p class="text-gray-500 mt-1">

                Tambahkan data warga baru.

            </p>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <form action="{{ route('warga.store') }}"
                    method="POST">

                    @csrf

                    {{-- Nama --}}
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('nama')

                        <p class="text-red-500 text-sm mt-1">

                            {{ $message }}

                        </p>

                        @enderror

                    </div>

                    {{-- Alamat --}}
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('alamat') }}</textarea>

                        @error('alamat')

                        <p class="text-red-500 text-sm mt-1">

                            {{ $message }}

                        </p>

                        @enderror

                    </div>

                    {{-- No HP --}}
                    <div class="mb-8">

                        <label class="block font-semibold mb-2">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('no_hp')

                        <p class="text-red-500 text-sm mt-1">

                            {{ $message }}

                        </p>

                        @enderror

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('warga.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

                            Batal

                        </a>

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>