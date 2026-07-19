<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                Tambah User

            </h2>

            <p class="text-gray-500 mt-1">

                Tambahkan akun admin atau petugas.

            </p>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <form action="{{ route('user.store') }}" method="POST">

                    @csrf

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Role
                        </label>

                        <select
                            name="role"
                            class="w-full border rounded-lg px-4 py-3">

                            <option value="">-- Pilih Role --</option>

                            <option value="admin">
                                Admin
                            </option>

                            <option value="petugas">
                                Petugas
                            </option>

                        </select>

                    </div>

                    <div class="mb-8">

                        <label class="block font-semibold mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('user.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

                            Batal

                        </a>

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>