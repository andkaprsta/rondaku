
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Tambah User
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">

            <form action="{{ route('user.store') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        class="w-full border rounded p-2">

                </div>

                <div class="mb-4">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="w-full border rounded p-2">

                </div>

                <div class="mb-4">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded p-2">

                </div>

                <div class="mb-4">

                    <label>Role</label>

                    <select
                        name="role"
                        class="w-full border rounded p-2">

                        <option value="petugas">Petugas</option>

                        <option value="admin">Admin</option>

                    </select>

                </div>

                <button
                    class="bg-blue-600 text-white px-5 py-2 rounded">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</x-app-layout>
