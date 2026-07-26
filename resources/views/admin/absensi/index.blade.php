<x-app-layout>

    <x-slot name="header">

        <div x-data="{ filterOpen: false }">

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-4 sm:p-5">

                {{-- ===== Mobile trigger bar (< lg) ===== --}}
                <div class="lg:hidden flex items-center gap-3">

                    <button
                        type="button"
                        @click="filterOpen = true"
                        class="flex-1 inline-flex items-center justify-center gap-1.5 bg-white border border-[#E5E7EB] text-gray-700 px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:bg-[#F8FAFC] transition-all duration-300">

                        <x-heroicon-o-funnel class="w-4 h-4 text-[#2563EB]" />
                        Filter

                        @if(request()->filled('tanggal_awal') || request()->filled('tanggal_akhir') || request()->filled('status'))
                        <span class="w-2 h-2 rounded-full bg-[#2563EB]"></span>
                        @endif

                    </button>

                    <a
                        href="{{ route('admin.absensi.pdf', request()->query()) }}"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300 whitespace-nowrap">

                        <x-heroicon-o-document-arrow-down class="w-4 h-4" />
                        PDF

                    </a>

                </div>

                {{-- ===== Desktop inline form (lg+) ===== --}}
                <form action="{{ route('admin.absensi') }}"
                    method="GET"
                    class="hidden lg:flex lg:items-end lg:flex-wrap gap-4">

                    <div class="grid grid-cols-3 gap-4 flex-1 min-w-0">

                        <div class="min-w-0">

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

                        <div class="min-w-0">

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

                        <div class="min-w-0">

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

                    </div>

                    <div class="flex flex-wrap gap-3 shrink-0">

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-funnel class="w-4 h-4" />
                            Filter

                        </button>

                        <a href="{{ route('admin.absensi') }}"
                            class="inline-flex items-center justify-center gap-1.5 bg-white text-gray-700 border border-[#E5E7EB] px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-arrow-path class="w-4 h-4" />
                            Reset

                        </a>

                        <a
                            href="{{ route('admin.absensi.pdf', request()->query()) }}"
                            target="_blank"
                            class="inline-flex items-center justify-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300 whitespace-nowrap">

                            <x-heroicon-o-document-arrow-down class="w-4 h-4" />
                            Export PDF

                        </a>

                    </div>

                </form>

            </div>

            {{-- ===== Mobile Bottom-Sheet Drawer (< lg) ===== --}}
            <div
                x-show="filterOpen"
                x-cloak
                class="lg:hidden fixed inset-0 z-50">

                <div
                    class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"
                    @click="filterOpen = false"
                    x-show="filterOpen"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                </div>

                <div
                    class="absolute inset-x-0 bottom-0 bg-white rounded-t-3xl shadow-2xl max-h-[85vh] overflow-y-auto"
                    x-show="filterOpen"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-y-full"
                    x-transition:enter-end="translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="translate-y-0"
                    x-transition:leave-end="translate-y-full">

                    <div class="sticky top-0 bg-white rounded-t-3xl flex items-center justify-between px-5 py-4 border-b border-[#E5E7EB]">

                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <x-heroicon-o-funnel class="w-5 h-5 text-[#2563EB]" />
                            Filter Absensi
                        </h3>

                        <button
                            type="button"
                            @click="filterOpen = false"
                            class="p-2 rounded-lg text-gray-400 hover:bg-[#F8FAFC] hover:text-gray-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                    </div>

                    <form action="{{ route('admin.absensi') }}" method="GET" class="p-5 space-y-4">

                        <div>

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

                        <div>

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

                        <div>

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

                        <div class="flex flex-col gap-3 pt-2">

                            <button
                                type="submit"
                                class="w-full inline-flex items-center justify-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300">

                                <x-heroicon-o-funnel class="w-4 h-4" />
                                Terapkan Filter

                            </button>

                            <a href="{{ route('admin.absensi') }}"
                                class="w-full text-center inline-flex items-center justify-center gap-1.5 bg-white text-gray-700 border border-[#E5E7EB] px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300">

                                <x-heroicon-o-arrow-path class="w-4 h-4" />
                                Reset

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))

            <div class="mb-5 flex items-center gap-2 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 text-sm font-medium">

                <x-heroicon-o-check-circle class="w-5 h-5 shrink-0" />

                {{ session('success') }}

            </div>

            @endif

            {{-- Search + Filter --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-5 mb-5">

                <form action="{{ route('admin.absensi') }}"
                    method="GET"
                    class="flex flex-col sm:flex-row sm:flex-wrap gap-3 sm:items-center">

                    <div class="relative w-full sm:w-72">

                        <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" />

                        <input
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Cari nama petugas..."
                            class="w-full pl-11 pr-4 py-2.5 rounded-full border border-[#E5E7EB] text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                    </div>

                    <select
                        name="status"
                        class="w-full sm:w-auto rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                               focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                               transition-colors duration-200">

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
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-[#2563EB] hover:bg-[#1D4ED8] text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-300 whitespace-nowrap">

                        <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                        Cari

                    </button>

                    @if(request()->filled('keyword') || request()->filled('status'))

                    <a href="{{ route('admin.absensi') }}"
                        class="w-full sm:w-auto text-center bg-white text-gray-700 border border-[#E5E7EB] px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300 whitespace-nowrap">

                        Reset

                    </a>

                    @endif

                </form>

            </div>

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

                        <thead class="bg-[#F8FAFC] sticky top-0">

                            <tr class="border-b border-[#E5E7EB]">

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

                                    No

                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

                                    Nama Petugas

                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

                                    Tanggal

                                </th>

                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

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