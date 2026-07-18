
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit User
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-xl mx-auto bg-white shadow rounded p-6">

            <form
                action="{{ route('user.update',$user->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $user->name }}"
                        class="w-full border rounded p-2">

                </div>

                <div class="mb-4">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ $user->email }}"
                        class="w-full border rounded p-2">

                </div>

                <div class="mb-4">

                    <label>Password Baru</label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded p-2">

                    <p class="text-sm text-gray-500">
                        Kosongkan jika tidak ingin mengganti password.
                    </p>

                </div>

                <div class="mb-4">

                    <label>Role</label>

                    <select
                        name="role"
                        class="w-full border rounded p-2">

                        <option
                            value="admin"
                            {{ $user->role=='admin' ? 'selected':'' }}>
                            Admin
                        </option>

                        <option
                            value="petugas"
                            {{ $user->role=='petugas' ? 'selected':'' }}>
                            Petugas
                        </option>

                    </select>

                </div>

                <button
                    class="bg-green-600 text-white px-5 py-2 rounded">

                    Update

                </button>

            </form>

        </div>

    </div>

</x-app-layout>
