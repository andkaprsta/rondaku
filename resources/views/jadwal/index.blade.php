<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Data Jadwal Ronda

                </h2>

                <p class="text-gray-500 mt-1">

                    Kelola jadwal petugas ronda.

                </p>

            </div>

            <a href="{{ route('jadwal.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow">

                + Tambah Jadwal

            </a>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))

            <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-5 py-4">

                {{ session('success') }}

            </div>

            @endif

            <div class="bg-white rounded-xl shadow-lg">

                <div class="p-6 border-b">

                    <h3 class="text-lg font-bold text-gray-700">

                        Daftar Jadwal

                    </h3>

                    <p class="text-sm text-gray-500">

                        Total :

                        <span class="font-bold text-blue-600">

                            {{ count($jadwals) }}

                        </span>

                        Jadwal

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-4 text-left">No</th>

                                <th class="px-6 py-4 text-left">Tanggal</th>

                                <th class="px-6 py-4 text-left">Petugas</th>

                                <th class="px-6 py-4 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($jadwals as $jadwal)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    {{ $loop->iteration }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d F Y') }}

                                </td>

                                <td class="px-6 py-4">

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                        {{ $jadwal->petugas->name }}

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('jadwal.edit',$jadwal->id) }}"
                                            class="inline-flex items-center justify-center h-10 px-4 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">

                                            Edit

                                        </a>

                                        <form action="{{ route('jadwal.destroy',$jadwal->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('Yakin ingin menghapus jadwal ini?')"
                                                class="inline-flex items-center justify-center h-10 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center py-12 text-gray-500">

                                    Belum ada jadwal.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>