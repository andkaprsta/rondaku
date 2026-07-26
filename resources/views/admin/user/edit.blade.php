<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold tracking-tight text-gray-900">

            Edit User

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl border border-[#E5E7EB] shadow-sm p-6 sm:p-8">

                @if ($errors->any())

                <div class="mb-6 flex items-start gap-2 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 px-5 py-4 text-sm">

                    <x-heroicon-o-exclamation-triangle class="w-5 h-5 shrink-0 mt-0.5" />

                    <ul class="list-disc ml-4 space-y-0.5">

                        @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

                @endif

                <form action="{{ route('user.update',$user->id) }}" method="POST" class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name',$user->name) }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200"
                            required>

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email',$user->email) }}"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200"
                            required>

                    </div>

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Role

                        </label>

                        <select
                            name="role"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200"
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

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-1.5">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-lg border border-[#E5E7EB] px-4 py-2.5 text-sm text-gray-900
                                   focus:outline-none focus:ring-2 focus:ring-[#2563EB]/30 focus:border-[#2563EB]
                                   transition-colors duration-200">

                        <p class="text-sm text-[#6B7280] mt-1.5">

                            Kosongkan jika password tidak ingin diubah.

                        </p>

                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-2">

                        <a href="{{ route('user.index') }}"
                            class="w-full sm:w-auto text-center bg-white text-gray-700 border border-[#E5E7EB] px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#F8FAFC] transition-all duration-300">

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-amber-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm hover:bg-amber-600 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">

                            <x-heroicon-o-pencil-square class="w-5 h-5" />
                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>