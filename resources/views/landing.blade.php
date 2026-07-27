<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RondaKu</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#F8FAFC] text-[#0F172A] antialiased overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->

    <nav id="navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-300 bg-white/70 backdrop-blur-xl border-b border-transparent">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center h-18 py-3">

                <div class="flex items-center gap-3">

                    <img src="{{ asset('img/logo-rondaku.png') }}" class="w-10 h-10 object-contain" alt="Logo">

                    <div>
                        <h1 class="text-lg font-bold tracking-tight text-[#0F172A] leading-none">RondaKu</h1>
                        <p class="text-[11px] text-[#64748B]">Digital Security Platform</p>
                    </div>

                </div>

                <div class="hidden md:flex items-center gap-9">

                    <a href="#" class="relative text-sm font-medium text-[#334155] hover:text-[#2563EB] transition-colors duration-300 group">
                        Beranda
                        <span class="absolute -bottom-1.5 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="#jadwal" class="relative text-sm font-medium text-[#334155] hover:text-[#2563EB] transition-colors duration-300 group">
                        Jadwal
                        <span class="absolute -bottom-1.5 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="#informasi" class="relative text-sm font-medium text-[#334155] hover:text-[#2563EB] transition-colors duration-300 group">
                        Fitur
                        <span class="absolute -bottom-1.5 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="#cta" class="relative text-sm font-medium text-[#334155] hover:text-[#2563EB] transition-colors duration-300 group">
                        Bergabung
                        <span class="absolute -bottom-1.5 left-0 w-0 h-0.5 bg-[#2563EB] transition-all duration-300 group-hover:w-full"></span>
                    </a>

                </div>

                <div class="hidden md:flex items-center gap-3">

                    <a href="{{ route('login') }}"
                        class="px-5 py-2.5 rounded-full text-sm font-semibold text-[#0F172A] hover:bg-slate-100 transition-all duration-300">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 rounded-full text-sm font-semibold bg-[#2563EB] text-white shadow-md shadow-blue-600/20 hover:bg-[#1D4ED8] hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                        Mulai Sekarang
                    </a>

                </div>

                <div class="md:hidden">

                    <button id="menuButton" class="text-[#2563EB] p-2 rounded-lg hover:bg-slate-100 transition-colors duration-300" aria-label="Buka menu">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                </div>

            </div>

        </div>

        <!-- Mobile Menu -->

        <div id="mobileMenu" class="hidden md:hidden border-t border-[#E2E8F0] bg-white/95 backdrop-blur-xl">

            <div class="flex flex-col p-5 gap-1">

                <a href="#" class="px-3 py-2.5 rounded-lg text-[#334155] hover:bg-slate-100 hover:text-[#2563EB] transition-colors duration-300">Beranda</a>
                <a href="#jadwal" class="px-3 py-2.5 rounded-lg text-[#334155] hover:bg-slate-100 hover:text-[#2563EB] transition-colors duration-300">Jadwal</a>
                <a href="#informasi" class="px-3 py-2.5 rounded-lg text-[#334155] hover:bg-slate-100 hover:text-[#2563EB] transition-colors duration-300">Fitur</a>
                <a href="#cta" class="px-3 py-2.5 rounded-lg text-[#334155] hover:bg-slate-100 hover:text-[#2563EB] transition-colors duration-300">Bergabung</a>

                <div class="flex flex-col gap-3 mt-3 pt-3 border-t border-[#E2E8F0]">

                    <a href="{{ route('login') }}"
                        class="bg-[#2563EB] text-white py-2.5 rounded-full text-center text-sm font-semibold hover:bg-[#1D4ED8] transition-colors duration-300">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="border border-[#2563EB] text-[#2563EB] py-2.5 rounded-full text-center text-sm font-semibold hover:bg-blue-50 transition-colors duration-300">
                        Register
                    </a>

                </div>

            </div>

        </div>

    </nav>

    <!-- ================= HERO ================= -->

    <section class="relative min-h-[92vh] flex items-center overflow-hidden pt-24">

        {{-- Decorative background --}}
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_#EFF6FF_0%,_#F8FAFC_55%)]"></div>
            <div class="absolute -top-32 -right-20 w-[32rem] h-[32rem] bg-blue-200/40 rounded-full blur-3xl animate-pulse [animation-duration:6s]"></div>
            <div class="absolute top-1/2 -left-32 w-96 h-96 bg-sky-200/40 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 w-full">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Left --}}
                <div data-aos="fade-right" data-aos-duration="800">

                    <span class="inline-flex items-center gap-2 bg-white border border-[#E2E8F0] px-4 py-2 rounded-full text-xs sm:text-sm font-medium text-[#2563EB] shadow-sm">
                        <x-heroicon-o-shield-check class="w-4 h-4" />
                        Government-Grade Security Platform
                    </span>

                    <h1 class="mt-6 text-[2.6rem] leading-[1.1] sm:text-6xl font-extrabold tracking-tight text-[#0F172A]">
                        Keamanan Lingkungan,
                        <span class="block bg-gradient-to-r from-[#2563EB] via-[#3B82F6] to-[#0EA5E9] bg-clip-text text-transparent">
                            Dikelola Secara Digital.
                        </span>
                    </h1>

                    <p class="mt-6 text-[#64748B] text-lg leading-8 max-w-lg">
                        RondaKu menyatukan jadwal ronda, absensi petugas, dan
                        informasi keamanan warga dalam satu platform yang cepat,
                        transparan, dan mudah digunakan.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4">

                        <a href="{{ route('register') }}"
                            class="group relative inline-flex items-center justify-center gap-2 overflow-hidden bg-[#2563EB] text-white px-8 py-4 rounded-2xl font-semibold shadow-xl shadow-blue-600/25 hover:shadow-2xl hover:-translate-y-0.5 transition-all duration-300">
                            <span class="absolute inset-0 bg-white/20 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500"></span>
                            <span class="relative">Mulai Gratis</span>
                            <x-heroicon-o-arrow-right class="relative w-5 h-5" />
                        </a>

                        <a href="#jadwal"
                            class="inline-flex items-center justify-center gap-2 bg-white border border-[#E2E8F0] text-[#0F172A] px-8 py-4 rounded-2xl font-semibold hover:border-[#2563EB] hover:text-[#2563EB] transition-all duration-300">
                            <x-heroicon-o-calendar-days class="w-5 h-5" />
                            Lihat Jadwal
                        </a>

                    </div>

                    <div class="mt-10 flex items-center gap-6 text-sm text-[#64748B]">
                        <div class="flex items-center gap-2">
                            <x-heroicon-o-check-badge class="w-5 h-5 text-emerald-500" />
                            Gratis digunakan
                        </div>
                        <div class="flex items-center gap-2">
                            <x-heroicon-o-check-badge class="w-5 h-5 text-emerald-500" />
                            Data real-time
                        </div>
                    </div>

                </div>

                {{-- Right: Mockup --}}
                <div class="relative flex justify-center lg:justify-end" data-aos="fade-left" data-aos-duration="800">

                    <div class="relative w-full max-w-md">

                        <div class="absolute -inset-6 bg-gradient-to-br from-blue-200/50 to-sky-200/50 rounded-[3rem] blur-2xl"></div>

                        {{-- Dashboard mockup card --}}
                        <div class="relative bg-white/90 backdrop-blur-xl border border-white rounded-3xl shadow-2xl shadow-blue-900/10 p-6 animate-[float_5s_ease-in-out_infinite]">

                            <div class="flex items-center justify-between mb-5">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('img/logo-rondaku.png') }}" class="w-7 h-7 object-contain">
                                    <span class="text-sm font-bold text-[#0F172A]">Dashboard RondaKu</span>
                                </div>
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            </div>

                            <div class="grid grid-cols-2 gap-3 mb-4">

                                <div class="rounded-2xl bg-blue-50 p-4">
                                    <x-heroicon-o-users class="w-5 h-5 text-[#2563EB] mb-2" />
                                    <p class="text-xl font-bold text-[#0F172A]">{{ $jumlahWarga }}</p>
                                    <p class="text-xs text-[#64748B]">Warga</p>
                                </div>

                                <div class="rounded-2xl bg-sky-50 p-4">
                                    <x-heroicon-o-shield-check class="w-5 h-5 text-[#0EA5E9] mb-2" />
                                    <p class="text-xl font-bold text-[#0F172A]">{{ $jumlahPetugas }}</p>
                                    <p class="text-xs text-[#64748B]">Petugas</p>
                                </div>

                            </div>

                            <div class="rounded-2xl border border-[#E2E8F0] p-4">
                                <p class="text-xs font-semibold text-[#64748B] mb-3">Aktivitas Ronda</p>
                                <div class="flex items-end gap-2 h-16">
                                    <div class="flex-1 bg-gradient-to-t from-[#2563EB] to-[#60A5FA] rounded-md h-[40%]"></div>
                                    <div class="flex-1 bg-gradient-to-t from-[#2563EB] to-[#60A5FA] rounded-md h-[70%]"></div>
                                    <div class="flex-1 bg-gradient-to-t from-[#2563EB] to-[#60A5FA] rounded-md h-[55%]"></div>
                                    <div class="flex-1 bg-gradient-to-t from-[#2563EB] to-[#60A5FA] rounded-md h-[90%]"></div>
                                    <div class="flex-1 bg-gradient-to-t from-[#2563EB] to-[#60A5FA] rounded-md h-[65%]"></div>
                                    <div class="flex-1 bg-gradient-to-t from-[#0EA5E9] to-[#7DD3FC] rounded-md h-[100%]"></div>
                                    <div class="flex-1 bg-gradient-to-t from-[#0EA5E9] to-[#7DD3FC] rounded-md h-[75%]"></div>
                                </div>
                            </div>

                        </div>

                        {{-- Floating badge card --}}
                        <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl border border-[#E2E8F0] px-5 py-3 flex items-center gap-3 animate-[float_4s_ease-in-out_infinite] [animation-delay:1s]">
                            <div class="w-9 h-9 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                <x-heroicon-o-check class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-[#64748B]">Absensi</p>
                                <p class="text-sm font-bold text-[#0F172A]">Terverifikasi</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= STATISTIK ================= -->

    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14" data-aos="fade-up">
                <span class="text-xs font-semibold tracking-wider uppercase text-[#2563EB]">Data Real-time</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-[#0F172A]">
                    RondaKu Dalam Angka
                </h2>
                <p class="mt-3 text-[#64748B]">Diperbarui otomatis dari sistem setiap saat.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">

                <div data-aos="zoom-in" data-aos-delay="0" class="relative bg-white/60 backdrop-blur-xl border border-[#E2E8F0] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2563EB] to-[#3B82F6] text-white flex items-center justify-center mb-4 shadow-lg shadow-blue-600/25">
                        <x-heroicon-o-users class="w-7 h-7" />
                    </div>
                    <h3 class="text-3xl sm:text-4xl font-bold text-[#0F172A] counter" data-target="{{ $jumlahWarga }}">0</h3>
                    <p class="mt-1 text-sm text-[#64748B]">Total Warga</p>
                </div>

                <div data-aos="zoom-in" data-aos-delay="100" class="relative bg-white/60 backdrop-blur-xl border border-[#E2E8F0] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#0EA5E9] to-[#38BDF8] text-white flex items-center justify-center mb-4 shadow-lg shadow-sky-500/25">
                        <x-heroicon-o-shield-check class="w-7 h-7" />
                    </div>
                    <h3 class="text-3xl sm:text-4xl font-bold text-[#0F172A] counter" data-target="{{ $jumlahPetugas }}">0</h3>
                    <p class="mt-1 text-sm text-[#64748B]">Petugas</p>
                </div>

                <div data-aos="zoom-in" data-aos-delay="200" class="relative bg-white/60 backdrop-blur-xl border border-[#E2E8F0] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-400 text-white flex items-center justify-center mb-4 shadow-lg shadow-amber-500/25">
                        <x-heroicon-o-calendar-days class="w-7 h-7" />
                    </div>
                    <h3 class="text-3xl sm:text-4xl font-bold text-[#0F172A] counter" data-target="{{ $jumlahJadwal }}">0</h3>
                    <p class="mt-1 text-sm text-[#64748B]">Jadwal</p>
                </div>

                <div data-aos="zoom-in" data-aos-delay="300" class="relative bg-white/60 backdrop-blur-xl border border-[#E2E8F0] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-400 text-white flex items-center justify-center mb-4 shadow-lg shadow-rose-500/25">
                        <x-heroicon-o-clipboard-document-check class="w-7 h-7" />
                    </div>
                    <h3 class="text-3xl sm:text-4xl font-bold text-[#0F172A] counter" data-target="{{ $jumlahAbsensi }}">0</h3>
                    <p class="mt-1 text-sm text-[#64748B]">Absensi</p>
                </div>

            </div>

        </div>

    </section>

    <!-- ================= JADWAL (TIMELINE) ================= -->

    <section id="jadwal" class="py-24 bg-[#F8FAFC]">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-xs font-semibold tracking-wider uppercase text-[#2563EB]">Terjadwal Otomatis</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-[#0F172A]">
                    Jadwal Ronda Tetap
                </h2>
                <p class="mt-3 text-[#64748B]">Jadwal petugas ronda yang berlaku setiap minggu.</p>
            </div>

            <div class="relative">

                {{-- Garis timeline --}}
                <div class="hidden sm:block absolute left-[27px] top-2 bottom-2 w-px bg-gradient-to-b from-[#2563EB] via-[#E2E8F0] to-transparent"></div>

                <div class="space-y-5">

                    @forelse($jadwalMinggu as $hari => $jadwals)

                    <div data-aos="fade-up" class="relative flex flex-col sm:flex-row gap-5 sm:items-center bg-white border border-[#E2E8F0] rounded-2xl p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">

                        <div class="hidden sm:flex relative z-10 w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-[#2563EB] to-[#3B82F6] text-white items-center justify-center shadow-lg shadow-blue-600/20">
                            <x-heroicon-o-calendar-days class="w-6 h-6" />
                        </div>

                        <div class="sm:w-44 shrink-0">
                            <p class="text-base font-bold text-[#0F172A]">
                                @php
                                $hariIndonesia = [
                                'Monday' => 'Senin',
                                'Tuesday' => 'Selasa',
                                'Wednesday' => 'Rabu',
                                'Thursday' => 'Kamis',
                                'Friday' => 'Jumat',
                                'Saturday' => 'Sabtu',
                                'Sunday' => 'Minggu',
                                ];
                                @endphp

                                {{ $hariIndonesia[$hari] }}
                            </p>
                            <p class="text-sm text-[#64748B]">
                                Jadwal Ronda Tetap
                            </p>
                        </div>

                        <div class="hidden sm:block w-px h-10 bg-[#E2E8F0]"></div>

                        <div class="flex flex-wrap gap-2">

                            @foreach($jadwals as $jadwal)

                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-blue-50 text-[#1D4ED8] text-xs sm:text-sm font-medium">
                                <x-heroicon-o-user-circle class="w-4 h-4" />
                                {{ $jadwal->petugas->name }}
                            </span>

                            @endforeach

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-14 text-[#64748B] bg-white rounded-2xl border border-[#E2E8F0]">
                        Belum ada jadwal ronda.
                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </section>

    <!-- ================= FITUR ================= -->

    <section id="informasi" class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-xs font-semibold tracking-wider uppercase text-[#2563EB]">Keunggulan</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-[#0F172A]">
                    Kenapa Menggunakan RondaKu?
                </h2>
                <p class="mt-3 text-[#64748B] max-w-2xl mx-auto">
                    Membantu pengelolaan keamanan lingkungan menjadi lebih mudah, transparan, dan efisien.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">

                <div data-aos="fade-up" data-aos-delay="0" class="group bg-white border border-[#E2E8F0] rounded-2xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2563EB] to-[#3B82F6] text-white flex items-center justify-center mb-5 shadow-lg shadow-blue-600/25 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-calendar-days class="w-7 h-7" />
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-2">Jadwal Digital</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Jadwal ronda tersusun otomatis dan dapat dilihat kapan saja.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100" class="group bg-white border border-[#E2E8F0] rounded-2xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 text-white flex items-center justify-center mb-5 shadow-lg shadow-emerald-500/25 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-check-circle class="w-7 h-7" />
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-2">Absensi Online</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Petugas dapat melakukan absensi langsung melalui website.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="group bg-white border border-[#E2E8F0] rounded-2xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-400 text-white flex items-center justify-center mb-5 shadow-lg shadow-amber-500/25 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-clipboard-document-list class="w-7 h-7" />
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-2">Laporan Lengkap</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Rekap absensi dan aktivitas dapat dipantau oleh admin.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300" class="group bg-white border border-[#E2E8F0] rounded-2xl p-8 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-400 text-white flex items-center justify-center mb-5 shadow-lg shadow-rose-500/25 group-hover:scale-110 transition-transform duration-300">
                        <x-heroicon-o-lock-closed class="w-7 h-7" />
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-2">Keamanan Data</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Seluruh data tersimpan dengan aman di dalam sistem.</p>
                </div>

            </div>

        </div>

    </section>

    <!-- ================= INFORMASI ================= -->

    <section class="py-24 bg-[#F8FAFC]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div data-aos="fade-right">

                    <span class="text-xs font-semibold tracking-wider uppercase text-[#2563EB]">Informasi</span>
                    <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-[#0F172A] mb-10">
                        Informasi Ronda
                    </h2>

                    <div class="relative space-y-8">

                        <div class="hidden sm:block absolute left-6 top-2 bottom-2 w-px bg-[#E2E8F0]"></div>

                        <div class="relative flex items-start gap-5">
                            <div class="relative z-10 flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-[#2563EB] to-[#3B82F6] text-white flex items-center justify-center shadow-lg shadow-blue-600/25">
                                <x-heroicon-o-clock class="w-6 h-6" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#0F172A]">Jam Ronda</h4>
                                <p class="mt-1 text-sm text-[#64748B]">22.00 WIB - 04.00 WIB</p>
                            </div>
                        </div>

                        <div class="relative flex items-start gap-5">
                            <div class="relative z-10 flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-[#0EA5E9] to-[#38BDF8] text-white flex items-center justify-center shadow-lg shadow-sky-500/25">
                                <x-heroicon-o-map-pin class="w-6 h-6" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#0F172A]">Lokasi Pos</h4>
                                <p class="mt-1 text-sm text-[#64748B]">Pos Keamanan Lingkungan RT / RW</p>
                            </div>
                        </div>

                        <div class="relative flex items-start gap-5">
                            <div class="relative z-10 flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-teal-400 text-white flex items-center justify-center shadow-lg shadow-emerald-500/25">
                                <x-heroicon-o-megaphone class="w-6 h-6" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#0F172A]">Tujuan</h4>
                                <p class="mt-1 text-sm text-[#64748B] leading-relaxed max-w-md">
                                    Menjaga keamanan, meningkatkan kepedulian warga, serta mempererat hubungan antar masyarakat.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="relative flex justify-center items-center" data-aos="fade-left">

                    <div class="absolute w-72 h-72 bg-gradient-to-br from-blue-200/60 to-sky-200/60 rounded-full blur-3xl"></div>

                    <div class="relative bg-white/80 backdrop-blur-xl border border-white rounded-3xl shadow-2xl shadow-blue-900/10 p-10">
                        <img src="{{ asset('img/logo-rondaku.png') }}" class="w-40 sm:w-52 mx-auto" alt="Logo RondaKu">
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= CTA ================= -->

    <section id="cta" class="relative py-24 overflow-hidden bg-gradient-to-br from-[#2563EB] via-[#1D4ED8] to-[#0F172A] text-white">

        <div class="pointer-events-none absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 w-[28rem] h-[28rem] bg-sky-400/20 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">

            <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                Siap Membuat Lingkungan Anda
                <span class="block">Lebih Aman &amp; Terkelola?</span>
            </h2>

            <p class="mt-6 text-blue-100 text-lg max-w-xl mx-auto">
                Bergabunglah dengan RondaKu dan kelola keamanan lingkungan Anda secara digital, mudah, dan transparan.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">

                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center gap-2 bg-white text-[#1D4ED8] px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    <x-heroicon-o-check-badge class="w-5 h-5" />
                    Daftar Sekarang
                </a>

                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center gap-2 border border-white/60 px-8 py-4 rounded-2xl font-semibold hover:bg-white hover:text-[#1D4ED8] transition-all duration-300">
                    Login
                </a>

            </div>

        </div>

    </section>

    <!-- ================= FOOTER ================= -->

    <footer class="bg-[#0F172A] text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="grid md:grid-cols-4 gap-10">

                <div class="md:col-span-2">

                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('img/logo-rondaku.png') }}" class="w-11 h-15 ">
                        <h3 class="text-xl font-bold">RondaKu</h3>
                    </div>

                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Platform digital untuk mengelola jadwal ronda, absensi petugas,
                        dan informasi keamanan lingkungan secara modern dan transparan.
                    </p>

                    <div class="flex items-center gap-3 mt-6">

                        <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#2563EB] flex items-center justify-center transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M13.5 9H15V6.5h-1.5C11.57 6.5 10 8.07 10 10v1.5H8.5V14H10v7h2.5v-7h1.75l.25-2.5H12.5V10c0-.55.45-1 1-1Z" />
                            </svg>
                        </a>

                        <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#2563EB] flex items-center justify-center transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M12 2c2.72 0 3.06.01 4.12.06 1.06.05 1.79.22 2.43.47.66.26 1.22.6 1.77 1.16.55.55.9 1.11 1.16 1.77.25.64.42 1.37.47 2.43.05 1.06.06 1.4.06 4.12s-.01 3.06-.06 4.12c-.05 1.06-.22 1.79-.47 2.43a4.9 4.9 0 0 1-1.16 1.77 4.9 4.9 0 0 1-1.77 1.16c-.64.25-1.37.42-2.43.47-1.06.05-1.4.06-4.12.06s-3.06-.01-4.12-.06c-1.06-.05-1.79-.22-2.43-.47a4.9 4.9 0 0 1-1.77-1.16 4.9 4.9 0 0 1-1.16-1.77c-.25-.64-.42-1.37-.47-2.43C2.01 15.06 2 14.72 2 12s.01-3.06.06-4.12c.05-1.06.22-1.79.47-2.43.26-.66.6-1.22 1.16-1.77A4.9 4.9 0 0 1 5.46 2.53c.64-.25 1.37-.42 2.43-.47C8.94 2.01 9.28 2 12 2Zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 8.25a3.25 3.25 0 1 1 0-6.5 3.25 3.25 0 0 1 0 6.5ZM17.5 6a1.13 1.13 0 1 0 0 2.25A1.13 1.13 0 0 0 17.5 6Z" />
                            </svg>
                        </a>

                        <a href="#" aria-label="WhatsApp" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#2563EB] flex items-center justify-center transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M12.04 2c-5.5 0-9.96 4.46-9.96 9.96 0 1.76.46 3.4 1.26 4.83L2 22l5.36-1.28a9.9 9.9 0 0 0 4.68 1.18h.01c5.5 0 9.96-4.46 9.96-9.96S17.54 2 12.04 2Zm5.86 14.16c-.25.7-1.42 1.36-1.96 1.44-.5.08-1.14.11-1.84-.12-.42-.13-.96-.31-1.65-.6-2.9-1.25-4.8-4.16-4.94-4.35-.14-.19-1.18-1.57-1.18-3 0-1.42.75-2.12 1.02-2.41.27-.29.58-.36.78-.36.2 0 .39 0 .56.01.18.01.42-.07.65.5.25.6.85 2.08.92 2.23.07.15.12.33.02.53-.1.2-.15.32-.3.5-.15.18-.31.4-.44.53-.15.15-.3.31-.13.6.17.3.76 1.25 1.63 2.02 1.12.99 2.06 1.3 2.36 1.45.3.15.47.13.65-.08.18-.2.75-.87.95-1.17.2-.3.4-.25.66-.15.27.1 1.71.81 2 .96.3.15.49.22.56.35.07.13.07.75-.18 1.45Z" />
                            </svg>
                        </a>

                    </div>

                </div>

                <div>

                    <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-slate-400">Menu</h4>

                    <ul class="space-y-2.5 text-slate-300 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors duration-200">Beranda</a></li>
                        <li><a href="#jadwal" class="hover:text-white transition-colors duration-200">Jadwal</a></li>
                        <li><a href="#informasi" class="hover:text-white transition-colors duration-200">Fitur</a></li>
                        <li><a href="#cta" class="hover:text-white transition-colors duration-200">Bergabung</a></li>
                    </ul>

                </div>

                <div>

                    <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-slate-400">Kontak</h4>

                    <ul class="space-y-2.5 text-slate-300 text-sm">
                        <li class="flex items-center gap-2">
                            <x-heroicon-o-envelope class="w-4 h-4 shrink-0" />
                            admin@rondaku.com
                        </li>
                        <li class="flex items-center gap-2">
                            <x-heroicon-o-phone class="w-4 h-4 shrink-0" />
                            08xxxxxxxxxx
                        </li>
                    </ul>

                </div>

            </div>

            <div class="border-t border-white/10 mt-12 pt-6 text-center text-slate-400 text-sm">
                © {{ date('Y') }} RondaKu. Semua Hak Dilindungi.
            </div>

        </div>

    </footer>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        AOS.init({
            duration: 700,
            once: true,
            offset: 60
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-sm', 'border-[#E2E8F0]', 'bg-white/90');
                navbar.classList.remove('bg-white/70');
            } else {
                navbar.classList.remove('shadow-sm', 'border-[#E2E8F0]', 'bg-white/90');
                navbar.classList.add('bg-white/70');
            }
        });

        // Mobile menu toggle
        const button = document.getElementById('menuButton');
        const menu = document.getElementById('mobileMenu');
        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const animateCounter = (el) => {
            const target = parseInt(el.dataset.target, 10) || 0;
            const duration = 1200;
            const start = performance.now();
            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                el.textContent = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(step);
                else el.textContent = target;
            };
            requestAnimationFrame(step);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.4
        });

        counters.forEach((el) => observer.observe(el));
    </script>

</body>

</html>