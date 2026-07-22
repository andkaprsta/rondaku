<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                Edit Warga

            </h2>

            <p class="text-gray-500 mt-1">

                Perbarui data warga.

            </p>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <div class="bg-white rounded-xl shadow-lg p-5 md:p-8">

                <form
                    action="{{ route('warga.update',$warga->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama',$warga->nama) }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    </div>

                    {{-- Alamat --}}
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('alamat',$warga->alamat) }}</textarea>

                    </div>

                    {{-- No HP --}}
                    <div class="mb-8">

                        <label class="block font-semibold mb-2">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp',$warga->no_hp) }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3">

                        <a href="{{ route('warga.index') }}"
                            class="w-full sm:w-auto text-center bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

                            Batal

                        </a>

                        <button
                            class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>