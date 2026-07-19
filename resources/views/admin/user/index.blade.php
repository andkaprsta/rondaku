
<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Data User

                </h2>

                <p class="text-gray-500 text-sm mt-1">

                    Kelola akun admin dan petugas.

                </p>

            </div>

            <a href="{{ route('user.create') }}"
                class="bg-blue-600 hover:bg-blue-700 transition text-white px-5 py-3 rounded-lg shadow">

                + Tambah User

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

            <div class="bg-white rounded-xl shadow-lg">

                <div class="flex justify-between items-center p-6 border-b">

                    <div>

                        <h3 class="text-lg font-bold text-gray-700">

                            Daftar User

                        </h3>

                        <p class="text-sm text-gray-500">

                            Total :

                            <span class="font-bold text-blue-600">

                                {{ count($users) }}

                            </span>

                            User

                        </p>

                    </div>

                    <input
                        type="text"
                        placeholder="Cari user..."
                        class="border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-4 text-left">

                                    No

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Nama

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Email

                                </th>

                                <th class="px-6 py-4 text-left">

                                    Role

                                </th>

                                <th class="px-6 py-4 text-center">

                                    Aksi

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                            <tr class="border-b hover:bg-gray-50 transition">

                                <td class="px-6 py-4">

                                    {{ $loop->iteration }}

                                </td>

                                <td class="px-6 py-4 font-semibold">

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

            </div>

        </div>

    </div>

</x-app-layout>
