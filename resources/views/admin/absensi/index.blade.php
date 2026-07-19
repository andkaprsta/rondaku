<x-app-layout>

    <x-slot name="header">

        <div class="bg-white rounded-xl shadow p-5 mb-6">

            <form action="{{ route('admin.absensi') }}"
                method="GET"
                class="flex flex-wrap items-end gap-4">

                {{-- Tanggal Awal --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-1">

                        Dari

                    </label>

                    <input
                        type="date"
                        name="tanggal_awal"
                        value="{{ request('tanggal_awal') }}"
                        class="border border-gray-300 rounded-lg px-3 py-2">

                </div>

                {{-- Tanggal Akhir --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-1">

                        Sampai

                    </label>

                    <input
                        type="date"
                        name="tanggal_akhir"
                        value="{{ request('tanggal_akhir') }}"
                        class="border border-gray-300 rounded-lg px-3 py-2">

                </div>

                {{-- Status --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-1">

                        Status

                    </label>

                    <select
                        name="status"
                        class="border border-gray-300 rounded-lg px-3 py-2">

                        <option value="">Semua</option>

                        <option
                            value="hadir"
                            {{ request('status')=='hadir' ? 'selected' : '' }}>

                            Hadir

                        </option>

                        <option
                            value="tidak hadir"
                            {{ request('status')=='tidak hadir' ? 'selected' : '' }}>

                            Tidak Hadir

                        </option>

                    </select>

                </div>

                {{-- Filter --}}
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                    Filter

                </button>

                {{-- Reset --}}
                <a href="{{ route('admin.absensi') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                    Reset

                </a>

                {{-- Export PDF --}}
                <a
                    href="{{ route('admin.absensi.pdf', request()->query()) }}"
                    target="_blank"
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg ml-auto">

                    Export PDF

                </a>

            </form>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))

            <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-5 py-4">

                {{ session('success') }}

            </div>

            @endif

            {{-- Search + Filter --}}
            <div class="bg-white rounded-xl shadow p-5 mb-5">

                <form action="{{ route('admin.absensi') }}"
                    method="GET"
                    class="flex flex-wrap gap-3 items-center">

                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="Cari nama petugas..."
                        class="w-72 border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <select
                        name="status"
                        class="border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500">

                        <option value="">

                            Semua

                        </option>

                        <option
                            value="hadir"
                            {{ request('status')=='hadir' ? 'selected' : '' }}>

                            Hadir

                        </option>

                        <option
                            value="tidak hadir"
                            {{ request('status')=='tidak hadir' ? 'selected' : '' }}>

                            Tidak Hadir

                        </option>

                    </select>

                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg">

                        Cari

                    </button>

                    @if(request()->filled('keyword') || request()->filled('status'))

                    <a href="{{ route('admin.absensi') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2.5 rounded-lg">

                        Reset

                    </a>

                    @endif

                </form>

            </div>

            <div class="bg-white rounded-xl shadow-lg">

                <div class="p-6 border-b">

                    <h3 class="text-lg font-bold text-gray-700">

                        Daftar Absensi

                    </h3>

                    <p class="text-sm text-gray-500">

                        Total :

                        <span class="font-bold text-blue-600">

                            {{ $absensi->total() }}

                        </span>

                        Data

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-4 text-left">

                                    No

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Nama Petugas

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Tanggal

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Status

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($absensi as $item)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    {{ $absensi->firstItem() + $loop->index }}

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    {{ $item->jadwal->petugas->name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->format('d M Y') }}

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @if($item->status == 'hadir')

                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                        Hadir
                                    </span>

                                    @else

                                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                        Tidak Hadir
                                    </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="4" class="text-center py-10 text-gray-500">
                                    Belum ada data absensi.
                                </td>

                            </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

                <div class="p-5">

                    {{ $absensi->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>