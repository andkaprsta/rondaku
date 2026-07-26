<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                    Data Warga

                </h2>

                <p class="text-sm text-[#6B7280] mt-1">

                    Kelola seluruh data warga.

                </p>

            </div>

            <a href="{{ route('warga.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-[#2563EB] text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:bg-[#1D4ED8] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                <x-heroicon-o-plus class="w-5 h-5" />
                Tambah Warga

            </a>

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

            {{-- Search & Filter --}}
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3 mb-5">

                <form action="{{ route('warga.index') }}" method="GET">

                    <div class="relative">

                        <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" />

                        <input
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Cari warga..."
                            class="w-full sm:w-72 pl-10 pr-4 py-2.5 rounded-lg border border-[#E5E7EB] text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                    </div>

                </form>

                @if(request('keyword'))

                <a href="{{ route('warga.index') }}"
                    class="inline-flex items-center justify-center bg-white text-gray-700 border border-[#E5E7EB] px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300">

                    Reset

                </a>

                @endif

            </div>

            {{-- Table Card --}}
            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm">

                <div class="p-5 sm:p-6 border-b border-[#E5E7EB]">

                    <h3 class="text-lg font-bold text-gray-900">

                        Daftar Warga

                    </h3>

                    <p class="text-sm text-[#6B7280] mt-1">

                        Total :
                        <span class="font-bold text-[#2563EB]">

                            {{ $warga->total() }}

                        </span>
                        Warga

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full text-sm">

                        <thead class="bg-[#F8FAFC] sticky top-0">

                            <tr class="border-b border-[#E5E7EB]">

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    No
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    Nama
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    Alamat
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    No HP
                                </th>

                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-[#6B7280]">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-[#E5E7EB]">

                            @forelse($warga as $item)

                            <tr class="odd:bg-white even:bg-[#F8FAFC] hover:bg-blue-50/60 transition-colors duration-200">

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $warga->firstItem() + $loop->index }}

                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900">

                                    {{ $item->nama }}

                                </td>

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $item->alamat }}

                                </td>

                                <td class="px-6 py-4 text-gray-600">

                                    {{ $item->no_hp }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('warga.edit',$item->id) }}"
                                            class="inline-flex items-center justify-center gap-1.5 h-9 px-3.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg text-xs font-semibold shadow-sm hover:shadow-md transition-all duration-300">

                                            <x-heroicon-o-pencil-square class="w-4 h-4" />
                                            Edit

                                        </a>

                                        <form
                                            action="{{ route('warga.destroy',$item->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="inline-flex items-center justify-center gap-1.5 h-9 px-3.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-semibold shadow-sm hover:shadow-md transition-all duration-300">

                                                <x-heroicon-o-trash class="w-4 h-4" />
                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center py-12 text-[#6B7280]">

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