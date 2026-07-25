<aside
    x-cloak
    class="fixed inset-y-0 left-0 z-40 flex flex-col bg-white border-r border-[#E5E7EB] shadow-sm transition-all duration-300 ease-in-out -translate-x-full lg:translate-x-0 w-64"
    :class="{ 'translate-x-0': sidebarOpen, 'lg:w-20': collapsed, 'lg:w-64': !collapsed }">

    {{-- Logo + Nama Aplikasi --}}
    <div class="flex items-center gap-3 h-16 px-4 border-b border-[#E5E7EB] shrink-0">

        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 overflow-hidden">

            <div class="w-9 h-9 rounded-lg bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                <x-heroicon-o-shield-check class="w-5 h-5" />
            </div>

            <span class="font-bold text-gray-900 whitespace-nowrap" x-show="!collapsed" x-transition>
                RondaKu
            </span>

        </a>

        {{-- Tombol tutup (mobile) --}}
        <button
            @click="sidebarOpen = false"
            class="lg:hidden ml-auto p-1.5 rounded-lg text-gray-400 hover:bg-[#F8FAFC] hover:text-[#2563EB] transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 overflow-y-auto overflow-x-hidden px-3 py-4 space-y-6">

        @if(Auth::user()->role == 'admin')

        {{-- Dashboard --}}
        <div>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                <x-heroicon-o-home class="w-5 h-5 shrink-0" />
                <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Dashboard</span>
            </a>
        </div>

        {{-- Master Data --}}
        <div>
            <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400 whitespace-nowrap" x-show="!collapsed" x-transition>
                Master Data
            </p>
            <div class="space-y-1">

                <a href="{{ route('warga.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('warga.*') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-users class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Warga</span>
                </a>

                <a href="{{ route('user.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('user.*') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-identification class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>User</span>
                </a>

            </div>
        </div>

        {{-- Operasional --}}
        <div>
            <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400 whitespace-nowrap" x-show="!collapsed" x-transition>
                Operasional
            </p>
            <div class="space-y-1">

                <a href="{{ route('jadwal.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('jadwal.*') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-calendar-days class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Jadwal</span>
                </a>

                <a href="{{ route('jadwal.calendar') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('jadwal.calendar') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-calendar class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Kalender Jadwal</span>
                </a>

                <a href="{{ route('admin.absensi') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('admin.absensi') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-clipboard-document-check class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Rekap Absensi</span>
                </a>

            </div>
        </div>

        @else

        {{-- Dashboard Petugas --}}
        <div>
            <a href="{{ route('petugas.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                {{ request()->routeIs('petugas.dashboard') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                <x-heroicon-o-home class="w-5 h-5 shrink-0" />
                <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Dashboard</span>
            </a>
        </div>

        {{-- Operasional Petugas --}}
        <div>
            <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400 whitespace-nowrap" x-show="!collapsed" x-transition>
                Operasional
            </p>
            <div class="space-y-1">

                <a href="{{ route('absensi.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('absensi.*') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-clipboard-document-list class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Absensi</span>
                </a>

                <a href="{{ route('petugas.riwayat') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ request()->routeIs('riwayat-absensi.*') ? 'bg-blue-50 text-[#2563EB]' : 'text-gray-600 hover:bg-[#F8FAFC] hover:text-[#2563EB]' }}">
                    <x-heroicon-o-clock class="w-5 h-5 shrink-0" />
                    <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Riwayat Absensi</span>
                </a>

            </div>
        </div>

        @endif

    </nav>

    {{-- Bawah: Toggle Collapse + Logout --}}
    <div class="border-t border-[#E5E7EB] p-3 space-y-1 shrink-0">

        <button
            @click="collapsed = !collapsed"
            class="hidden lg:flex w-full items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-500 hover:bg-[#F8FAFC] hover:text-[#2563EB] transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-5 h-5 shrink-0 transition-transform duration-300" :class="{ 'rotate-180': collapsed }">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
            <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Ciutkan Menu</span>
        </button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-rose-600 hover:bg-rose-50 transition-colors duration-200 cursor-pointer">
                <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5 shrink-0" />
                <span class="whitespace-nowrap" x-show="!collapsed" x-transition>Logout</span>
            </a>
        </form>

    </div>

</aside>

{{-- Overlay backdrop untuk mobile --}}
<div
    x-cloak
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 bg-gray-900/50 z-30 lg:hidden">
</div>