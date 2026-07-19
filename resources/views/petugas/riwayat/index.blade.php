<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Riwayat Absensi

                </h2>

                <p class="text-gray-500 mt-1">

                    Riwayat absensi yang pernah Anda lakukan.

                </p>

            </div>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))

            <div class="mb-5 bg-green-100 border border-green-300 text-green-700 rounded-lg px-5 py-4">

                {{ session('success') }}

            </div>

            @endif

            <div class="bg-white rounded-xl shadow-lg">

                <div class="p-6 border-b">

                    <h3 class="text-lg font-bold text-gray-700">

                        Daftar Riwayat Absensi

                    </h3>

                    <p class="text-sm text-gray-500">

                        Total :

                        <span class="font-bold text-blue-600">

                            {{ $riwayat->total() }}

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

                                    Tanggal

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Status

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($riwayat as $item)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    {{ $riwayat->firstItem() + $loop->index }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d F Y') }}

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @if($item->status == 'hadir')

                                    <span class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                        Hadir

                                    </span>

                                    @else

                                    <span class="inline-flex px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                                        Tidak Hadir

                                    </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="3" class="text-center py-10 text-gray-500">

                                    Belum ada riwayat absensi.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                @if($riwayat->hasPages())

                <div class="p-5">

                    {{ $riwayat->links() }}

                </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>