<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                Edit User

            </h2>

            <p class="text-gray-500 mt-1">

                Perbarui informasi user.

            </p>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <form action="{{ route('user.update',$user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name',$user->name) }}"
                            class="w-full border rounded-lg px-4 py-3">

                    </div>

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email',$user->email) }}"
                            class="w-full border rounded-lg px-4 py-3">

                    </div>

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Role
                        </label>

                        <select
                            name="role"
                            class="w-full border rounded-lg px-4 py-3">

                            <option value="admin"
                                {{ $user->role=='admin'?'selected':'' }}>
                                Admin
                            </option>

                            <option value="petugas"
                                {{ $user->role=='petugas'?'selected':'' }}>
                                Petugas
                            </option>

                        </select>

                    </div>

                    <div class="mb-8">

                        <label class="block font-semibold mb-2">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Kosongkan jika tidak diubah"
                            class="w-full border rounded-lg px-4 py-3">

                    </div>

                    <div class="flex justify-end gap-3">

                        <a href="{{ route('user.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

                            Batal

                        </a>

                        <button
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg">

                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>