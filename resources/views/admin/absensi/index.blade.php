<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                Rekap Absensi
            </h2>

            <p class="text-sm text-[#6B7280] mt-1">
                Lihat, filter, dan export data absensi petugas ronda.
            </p>

        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if(session('success'))

            <div class="mb-5 flex items-center gap-2 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 text-sm font-medium">

                <x-heroicon-o-check-circle class="w-5 h-5 shrink-0" />

                {{ session('success') }}

            </div>

            @endif

            {{-- ================= TOOLBAR TERPADU ================= --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-4 sm:p-5 mb-5">

                <form action="{{ route('admin.absensi') }}" method="GET"
                    class="flex flex-col lg:flex-row lg:items-end lg:flex-wrap gap-3.5">

                    {{-- Search --}}
                    <div class="relative w-full lg:w-64">

                        <label class="block text-sm font-medium text-gray-700 mb-1.5 lg:hidden">
                            Cari Petugas
                        </label>

                        <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 lg:top-[60%] -translate-y-1/2" />

                        <input
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Cari nama petugas..."
                            class="w-full pl-11 pr-4 py-2.5 rounded-full border border-[#E5E7EB] text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                    </div>

                    {{-- Tanggal Awal --}}
                    <div class="w-full sm:flex-1 lg:w-40 lg:flex-none">

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Dari
                        </label>

                        <input
                            type="date"
                            name="tanggal_awal"
                            value="{{ request('tanggal_awal') }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-3.5 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                    </div>

                    {{-- Tanggal Akhir --}}
                    <div class="w-full sm:flex-1 lg:w-40 lg:flex-none">

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Sampai
                        </label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            value="{{ request('tanggal_akhir') }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-3.5 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                    </div>

                    {{-- Status --}}
                    <div class="w-full sm:flex-1 lg:w-40 lg:flex-none">

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-lg border border-[#E5E7EB] px-3.5 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                            <option value="">Semua</option>

                            <option value="hadir" {{ request('status')=='hadir' ? 'selected' : '' }}>
                                Hadir
                            </option>

                            <option value="tidak hadir" {{ request('status')=='tidak hadir' ? 'selected' : '' }}>
                                Tidak Hadir
                            </option>

                        </select>

                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex flex-wrap gap-2.5 w-full lg:w-auto pt-1 lg:pt-0">

                        <button
                            type="submit"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-funnel class="w-4 h-4" />
                            Filter

                        </button>

                        <a href="{{ route('admin.absensi') }}"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 bg-white text-gray-700 border border-[#E5E7EB] px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-[#F8FAFC] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-arrow-path class="w-4 h-4" />
                            Reset

                        </a>

                        <a
                            href="{{ route('admin.absensi.pdf', request()->query()) }}"
                            target="_blank"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-document-text class="w-4 h-4" />
                            PDF

                        </a>

                        <a
                            href="{{ route('admin.absensi.export.excel', request()->query()) }}"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-document-arrow-down class="w-4 h-4" />
                            Excel

                        </a>

                    </div>

                </form>

            </div>

            {{-- ================= TABEL ================= --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm">

                <div class="p-5 sm:p-6 border-b border-[#E5E7EB]">

                    <h3 class="text-lg font-bold text-gray-900">
                        Daftar Absensi
                    </h3>

                    <p class="text-sm text-[#6B7280] mt-1">
                        Total :
                        <span class="font-bold text-[#2563EB]">
                            {{ $absensi->total() }}
                        </span>
                        Data
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full w-max sm:w-full text-sm">

                        <thead class="bg-gradient-to-r from-[#2563EB] to-[#1D4ED8] sticky top-0">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-white whitespace-nowrap">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-white whitespace-nowrap">
                                    Nama Petugas
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-white whitespace-nowrap">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-white whitespace-nowrap">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-[#E5E7EB]">

                            @forelse($absensi as $item)

                            <tr class="odd:bg-white even:bg-[#F8FAFC] hover:bg-blue-50/60 transition-colors duration-200">

                                <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                    {{ $absensi->firstItem() + $loop->index }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->jadwal->petugas->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-center whitespace-nowrap">

                                    @if($item->status == 'hadir')

                                    <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-3.5 py-1.5 rounded-full text-xs font-semibold">
                                        Hadir
                                    </span>

                                    @else

                                    <span class="inline-flex items-center bg-rose-50 text-rose-700 px-3.5 py-1.5 rounded-full text-xs font-semibold">
                                        Tidak Hadir
                                    </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="4" class="text-center py-10 text-[#6B7280]">
                                    Belum ada data absensi.
                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-5 overflow-x-auto">

                    {{ $absensi->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>