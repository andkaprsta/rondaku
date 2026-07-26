<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

            <div>

                <h2 class="text-2xl font-bold tracking-tight text-gray-900">

                    Riwayat Absensi

                </h2>

                <p class="text-sm text-[#6B7280] mt-1">

                    Riwayat absensi yang pernah Anda lakukan.

                </p>

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

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm">

                <div class="p-5 sm:p-6 border-b border-[#E5E7EB]">

                    <h3 class="text-lg font-bold text-gray-900">

                        Daftar Riwayat Absensi

                    </h3>

                    <p class="text-sm text-[#6B7280] mt-1">

                        Total :
                        <span class="font-bold text-[#2563EB]">

                            {{ $riwayat->total() }}

                        </span>
                        Data

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full w-max sm:w-full text-sm">

                        <thead class="bg-[#F8FAFC] sticky top-0">

                            <tr class="border-b border-[#E5E7EB]">

                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

                                    No

                                </th>

                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

                                    Tanggal

                                </th>

                                <th class="px-4 sm:px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-[#6B7280] whitespace-nowrap">

                                    Status

                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-[#E5E7EB]">

                            @forelse($riwayat as $item)

                            <tr class="odd:bg-white even:bg-[#F8FAFC] hover:bg-blue-50/60 transition-colors duration-200">

                                <td class="px-4 sm:px-6 py-4 text-gray-600 whitespace-nowrap">

                                    {{ $riwayat->firstItem() + $loop->index }}

                                </td>

                                <td class="px-4 sm:px-6 py-4 text-gray-600 whitespace-nowrap">

                                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d F Y') }}

                                </td>

                                <td class="px-4 sm:px-6 py-4 text-center whitespace-nowrap">

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

                                <td colspan="3" class="text-center py-10 text-[#6B7280]">

                                    Belum ada riwayat absensi.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                @if($riwayat->hasPages())

                <div class="p-5 overflow-x-auto">

                    {{ $riwayat->links() }}

                </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>