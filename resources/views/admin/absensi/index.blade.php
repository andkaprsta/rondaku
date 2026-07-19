<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Rekap Absensi
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto">

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Nama Petugas</th>
                            <th class="px-6 py-3 text-left">Tanggal</th>
                            <th class="px-6 py-3 text-left">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($absensis as $absensi)

                        <tr class="border-b">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $absensi->jadwal?->petugas?->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($absensi->jadwal->tanggal)->format('d-m-Y') }}
                            </td>

                            <td class="px-6 py-4">

                                @if($absensi->status == 'hadir')

                                <span class="bg-green-500 text-white px-3 py-1 rounded">

                                    Hadir

                                </span>

                                @else

                                <span class="bg-red-500 text-white px-3 py-1 rounded">

                                    Tidak Hadir

                                </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center py-5">

                                Belum ada data absensi.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
```