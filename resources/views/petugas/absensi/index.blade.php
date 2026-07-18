<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Absensi Petugas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            {{-- Alert Success --}}
            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
            @endif

            {{-- Alert Error --}}
            @if(session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                @if($jadwal)

                <h3 class="text-lg font-bold mb-4">
                    Jadwal Ronda Hari Ini
                </h3>

                <table class="table-auto w-full mb-5">

                    <tr>
                        <td class="font-semibold py-2">
                            Nama Petugas
                        </td>

                        <td>
                            {{ auth()->user()->name }}
                        </td>
                    </tr>

                    <tr>
                        <td class="font-semibold py-2">
                            Tanggal
                        </td>

                        <td>
                            {{ $jadwal->tanggal }}
                        </td>
                    </tr>

                </table>

                @if($absensi)

                <div class="bg-green-100 text-green-700 p-4 rounded-lg">

                    ✅ Anda sudah melakukan absensi hari ini.

                </div>

                @else

                <form action="{{ route('absensi.store') }}" method="POST">

                    @csrf

                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                        Hadir

                    </button>

                </form>

                @endif

                @else

                <div class="bg-yellow-100 text-yellow-700 p-5 rounded-lg">

                    Anda tidak memiliki jadwal ronda hari ini.

                </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
```