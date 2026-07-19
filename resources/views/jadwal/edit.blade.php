<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                Edit Jadwal Ronda

            </h2>

            <p class="text-gray-500 mt-1">

                Perbarui jadwal ronda.

            </p>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <form action="{{ route('jadwal.update',$jadwal->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-6">

                        <label class="block font-semibold text-gray-700 mb-2">

                            Tanggal Ronda

                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ old('tanggal',$jadwal->tanggal) }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('tanggal')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="mb-8">

                        <label class="block font-semibold text-gray-700 mb-2">

                            Petugas

                        </label>

                        <select
                            name="petugas_id"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                            @foreach($petugas as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('petugas_id',$jadwal->petugas_id)==$item->id ? 'selected' : '' }}>

                                {{ $item->name }}

                            </option>

                            @endforeach

                        </select>

                        @error('petugas_id')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('jadwal.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg transition">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg transition">

                            Update Jadwal

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>