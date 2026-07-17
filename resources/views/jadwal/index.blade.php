<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Data Jadwal
            </h2>

            <a href="{{ route('jadwal.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Tambah Jadwal
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="min-w-full">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Petugas</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($jadwals as $jadwal)

                        <tr class="border-t">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $jadwal->tanggal }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $jadwal->petugas->name }}
                            </td>

                            <td class="px-6 py-4">

                                <a href="{{ route('jadwal.edit',$jadwal->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('jadwal.destroy',$jadwal->id) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" class="text-center py-5">
                                Belum ada jadwal.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>