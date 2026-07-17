<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Warga
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('warga.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2">Nama</label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            class="w-full border rounded-lg p-2">

                        @error('nama')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Alamat</label>

                        <textarea
                            name="alamat"
                            class="w-full border rounded-lg p-2">{{ old('alamat') }}</textarea>

                        @error('alamat')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">No HP</label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            class="w-full border rounded-lg p-2">

                        @error('no_hp')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <button
                        class="bg-blue-600 text-white px-5 py-2 rounded">
                        Simpan
                    </button>

                    <a href="{{ route('warga.index') }}"
                        class="bg-gray-500 text-white px-5 py-2 rounded">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>