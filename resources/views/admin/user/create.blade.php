<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold text-gray-800">

            Tambah User

        </h2>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <div class="bg-white rounded-xl shadow-lg p-5 md:p-8">

                @if ($errors->any())

                <div class="mb-5 bg-red-100 border border-red-300 text-red-700 rounded-lg p-4">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

                @endif

                <form action="{{ route('user.store') }}" method="POST">

                    @csrf

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>

                    </div>

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>

                    </div>

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">

                            Role

                        </label>

                        <select
                            name="role"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>

                            <option value="">-- Pilih Role --</option>

                            <option value="admin">Admin</option>

                            <option value="petugas">Petugas</option>

                        </select>

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>

                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white w-full sm:w-auto px-6 py-3 rounded-lg">

                            Simpan

                        </button>

                        <a href="{{ route('user.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white w-full sm:w-auto px-6 py-3 rounded-lg">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>