<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- Logo --}}
            <div class="flex">

                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}">

                        <span class="text-2xl font-bold text-blue-600">

                            🛡 RondaKu

                        </span>

                    </a>

                </div>

                {{-- Menu Desktop --}}
                <div class="hidden sm:flex sm:items-center sm:space-x-6 sm:ms-10">

                    @if(Auth::user()->role == 'admin')

                    <x-nav-link :href="route('admin.dashboard')"
                        :active="request()->routeIs('admin.dashboard')">

                        Dashboard

                    </x-nav-link>

                    <x-nav-link :href="route('warga.index')"
                        :active="request()->routeIs('warga.*')">

                        Data Warga

                    </x-nav-link>

                    <x-nav-link :href="route('user.index')"
                        :active="request()->routeIs('user.*')">

                        Data User

                    </x-nav-link>

                    <x-nav-link :href="route('jadwal.index')"
                        :active="request()->routeIs('jadwal.*')">

                        Jadwal

                    </x-nav-link>

                    <x-nav-link :href="route('admin.absensi')"
                        :active="request()->routeIs('admin.absensi')">

                        Rekap Absensi

                    </x-nav-link>

                    @else

                    <x-nav-link :href="route('petugas.dashboard')"
                        :active="request()->routeIs('petugas.dashboard')">

                        Dashboard

                    </x-nav-link>

                    <x-nav-link :href="route('absensi.index')"
                        :active="request()->routeIs('absensi.*')">

                        Absensi

                    </x-nav-link>

                    <x-nav-link :href="route('petugas.riwayat')"
                        :active="request()->routeIs('riwayat-absensi.*')">

                        Riwayat Absensi

                    </x-nav-link>


                    @endif

                </div>

            </div>

            {{-- Dropdown User --}}
            <div class="hidden sm:flex sm:items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-600 transition">

                            <div>

                                {{ Auth::user()->name }}

                            </div>

                            <svg class="ms-2 h-4 w-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <div class="px-4 py-2 text-sm text-gray-500">

                            {{ ucfirst(Auth::user()->role) }}

                        </div>

                        <x-dropdown-link :href="route('profile.edit')">

                            Profile

                        </x-dropdown-link>

                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            {{-- Hamburger --}}
            <div class="flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="p-2 rounded-md text-gray-500">

                    <svg class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" class="sm:hidden border-t">

        @if(Auth::user()->role == 'admin')

        <x-responsive-nav-link
            :href="route('admin.dashboard')">

            Dashboard

        </x-responsive-nav-link>

        <x-responsive-nav-link
            :href="route('warga.index')">

            Data Warga

        </x-responsive-nav-link>

        <x-responsive-nav-link
            :href="route('user.index')">

            Data User

        </x-responsive-nav-link>

        <x-responsive-nav-link
            :href="route('jadwal.index')">

            Jadwal

        </x-responsive-nav-link>

        <x-responsive-nav-link
            :href="route('admin.absensi')">

            Rekap Absensi

        </x-responsive-nav-link>

        @else

        <x-responsive-nav-link
            :href="route('petugas.dashboard')">

            Dashboard

        </x-responsive-nav-link>

        <x-responsive-nav-link
            :href="route('absensi.index')">

            Absensi

        </x-responsive-nav-link>

        @endif

    </div>

</nav>