<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit Jadwal
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form
                    action="{{ route('jadwal.update',$jadwal->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label>Tanggal</label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ $jadwal->tanggal }}"
                            class="w-full border rounded p-2">

                    </div>

                    <div class="mb-4">

                        <label>Petugas</label>

                        <select
                            name="petugas_id"
                            class="w-full border rounded p-2">

                            @foreach($petugas as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ $jadwal->petugas_id == $item->id ? 'selected' : '' }}>

                                {{ $item->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <button
                        class="bg-yellow-500 text-white px-5 py-2 rounded">

                        Update

                    </button>

                    <a
                        href="{{ route('jadwal.index') }}"
                        class="bg-gray-500 text-white px-5 py-2 rounded">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>