
<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold text-gray-800">

            Edit User

        </h2>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                @if ($errors->any())

                <div class="mb-5 bg-red-100 border border-red-300 text-red-700 rounded-lg p-4">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

                @endif

                <form action="{{ route('user.update',$user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-5">

                        <label class="block mb-2 font-semibold">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name',$user->name) }}"
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
                            value="{{ old('email',$user->email) }}"
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

                            <option value="admin"
                                {{ old('role',$user->role)=='admin' ? 'selected' : '' }}>

                                Admin

                            </option>

                            <option value="petugas"
                                {{ old('role',$user->role)=='petugas' ? 'selected' : '' }}>

                                Petugas

                            </option>

                        </select>

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-semibold">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <p class="text-sm text-gray-500 mt-2">

                            Kosongkan jika password tidak ingin diubah.

                        </p>

                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg transition">

                            Update

                        </button>

                        <a href="{{ route('user.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
