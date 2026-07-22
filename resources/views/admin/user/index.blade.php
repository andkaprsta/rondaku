<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Data User

                </h2>

                <p class="text-gray-500 mt-1">

                    Kelola akun pengguna aplikasi RondaKu.

                </p>

            </div>

            <a href="{{ route('user.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white w-full sm:w-auto px-5 py-3 rounded-lg shadow">

                + Tambah User

            </a>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))

            <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-5 py-4">

                {{ session('success') }}

            </div>

            @endif

            {{-- Search --}}
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3 mb-5">

                <form action="{{ route('user.index') }}" method="GET">

                    <div class="relative">

                        <input
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Cari user..."
                            class="w-full sm:w-72 pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">

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

                <a href="{{ route('user.index') }}"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition">

                    Reset

                </a>

                @endif

            </div>

            <div class="bg-white rounded-xl shadow-lg">

                <div class="p-6 border-b">

                    <h3 class="text-lg font-bold text-gray-700">

                        Daftar User

                    </h3>

                    <p class="text-sm text-gray-500">

                        Total :

                        <span class="font-bold text-blue-600">

                            {{ $users->total() }}

                        </span>

                        User

                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-4 text-left">No</th>

                                <th class="px-6 py-4 text-left">Nama</th>

                                <th class="px-6 py-4 text-left">Email</th>

                                <th class="px-6 py-4 text-left">Role</th>

                                <th class="px-6 py-4 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    {{ $users->firstItem() + $loop->index }}

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    {{ $user->name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $user->email }}

                                </td>

                                <td class="px-6 py-4">

                                    @if($user->role == 'admin')

                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                        Admin

                                    </span>

                                    @else

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                        Petugas

                                    </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('user.edit',$user->id) }}"
                                            class="inline-flex items-center justify-center h-10 px-4 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition">

                                            Edit

                                        </a>

                                        <form action="{{ route('user.destroy',$user->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('Yakin ingin menghapus user ini?')"
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

                                    Belum ada data user.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="p-5">

                    {{ $users->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>