<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Data Warga

                </h2>

                <p class="text-gray-500 mt-1">

                    Kelola seluruh data warga.

                </p>

            </div>

            <a href="{{ route('warga.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow">

                + Tambah Warga

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

            <div class="flex justify-end items-center gap-2 mb-5">

                <form action="{{ route('warga.index') }}" method="GET">

                    <div class="relative">

                        <input
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Cari warga..."
                            class="w-72 pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-3 top-2.5 h-5 w-5 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0a7 7 0 0114 0z" />

                        </svg>

                    </div>

                </form>

                @if(request('keyword'))

                <a href="{{ route('warga.index') }}"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition">

                    Reset

                </a>

                @endif

            </div>

            <div class="bg-white rounded-xl shadow-lg">

                <div class="p-6 border-b">

                    <h3 class="text-lg font-bold text-gray-700">

                        Daftar Warga

                    </h3>

                    <p class="text-sm text-gray-500">

                        Total :

                        <span class="font-bold text-blue-600">

                            {{ $warga->total() }}

                        </span>

                        Warga

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-4 text-left">No</th>

                                <th class="px-6 py-4 text-left">Nama</th>

                                <th class="px-6 py-4 text-left">Alamat</th>

                                <th class="px-6 py-4 text-left">No HP</th>

                                <th class="px-6 py-4 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($warga as $item)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    {{ $warga->firstItem() + $loop->index }}

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    {{ $item->nama }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $item->alamat }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $item->no_hp }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('warga.edit',$item->id) }}"
                                            class="inline-flex items-center justify-center h-10 px-4 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition">

                                            Edit

                                        </a>

                                        <form
                                            action="{{ route('warga.destroy',$item->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="inline-flex items-center justify-center h-10 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center py-12 text-gray-500">

                                    Belum ada data warga.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-5">

                    {{ $warga->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>