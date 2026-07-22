<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Edit Profile
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto px-6">

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 h-32"></div>

                <div class="px-8 pb-8">

                    {{-- Foto --}}
                    <div class="-mt-16 flex flex-col items-center">

                        @if(Auth::user()->photo)

                        <img
                            src="{{ asset('storage/' . Auth::user()->photo) }}"
                            class="w-32 h-32 rounded-full border-4 border-white object-cover shadow-lg">

                        @else

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff&size=256"
                            class="w-32 h-32 rounded-full border-4 border-white shadow-lg">

                        @endif

                        <h2 class="mt-4 text-2xl font-bold">

                            {{ Auth::user()->name }}

                        </h2>

                        <p class="text-gray-500">

                            {{ Auth::user()->email }}

                        </p>

                    </div>

                    <div class="mt-10">

                        @include('profile.partials.update-profile-information-form')

                    </div>

                    <div class="mt-10">

                        @include('profile.partials.update-password-form')

                    </div>

                    <div class="mt-10">

                        @include('profile.partials.delete-user-form')

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>