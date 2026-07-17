<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Warga
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('warga.update',$warga->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="block mb-2">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama',$warga->nama) }}"
                            class="w-full border rounded-lg p-2">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="w-full border rounded-lg p-2">{{ old('alamat',$warga->alamat) }}</textarea>

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp',$warga->no_hp) }}"
                            class="w-full border rounded-lg p-2">

                    </div>

                    <button
                        class="bg-yellow-500 text-white px-5 py-2 rounded">

                        Update

                    </button>

                    <a
                        href="{{ route('warga.index') }}"
                        class="bg-gray-500 text-white px-5 py-2 rounded">

                        Kembali

                    </a>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>