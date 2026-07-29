<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover, user-scalable=no">
    <meta name="theme-color" content="#2563EB">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>RondaKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-[100dvh] w-screen overflow-hidden bg-[#F8FAFC] text-[#0F172A] antialiased select-none">

    <div class="relative h-[100dvh] w-screen overflow-hidden flex items-center justify-center animate-[fadeIn_0.8s_ease-out_both]">

        {{-- ================= BACKGROUND ================= --}}
        <div class="absolute inset-0 -z-20 bg-gradient-to-br from-blue-50 via-white to-indigo-50 [background-size:200%_200%] animate-[gradientMove_14s_ease-in-out_infinite]">
        </div>
        <div class="absolute -top-28 -left-28 w-72 h-72 sm:w-96 sm:h-96 bg-blue-300/30 rounded-full blur-3xl -z-10">
        </div>
        <div class="absolute -bottom-28 -right-28 w-72 h-72 sm:w-96 sm:h-96 bg-indigo-300/30 rounded-full blur-3xl -z-10">
        </div>

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="relative z-10 w-full max-w-[420px] mx-auto px-6"
            style="padding-top: max(1.5rem, env(safe-area-inset-top)); padding-bottom: max(1.5rem, env(safe-area-inset-bottom));">

            <div class="flex flex-col items-center">

                {{-- ================= HEADER ================= --}}
                <div class="flex flex-col items-center text-center animate-[fadeInScale_0.7s_ease-out_both]">

                    <img src="{{ asset('img/logo-rondaku.png') }}" alt="RondaKu"
                        class="w-24 h-24 sm:w-28 sm:h-28 object-contain drop-shadow-lg animate-[float_4s_ease-in-out_infinite]">

                    <h1 class="mt-5 text-3xl sm:text-4xl font-extrabold tracking-tight text-[#0F172A] animate-[fadeInUp_0.6s_ease-out_0.15s_both]">
                        RONDAKU
                    </h1>

                    <p class="mt-2 text-sm sm:text-base text-[#64748B] animate-[fadeInUp_0.6s_ease-out_0.3s_both]">
                        Sistem Keamanan Lingkungan
                    </p>

                </div>

                {{-- ================= FEATURE CARD ================= --}}
                <div class="w-full mt-8 rounded-3xl bg-white/70 backdrop-blur-xl border border-white/60 shadow-xl px-5 py-2 sm:px-6 sm:py-3 transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl animate-[fadeInUp_0.6s_ease-out_0.45s_both]">

                    <ul class="divide-y divide-slate-100">

                        <li class="flex items-center gap-3 py-3.5">
                            <span class="flex items-center justify-center w-10 h-10 shrink-0 rounded-2xl bg-blue-50 text-[#2563EB]">
                                <x-heroicon-o-qr-code class="w-5 h-5" />
                            </span>
                            <span class="text-sm sm:text-[15px] font-medium text-[#0F172A]">Absensi QR Code</span>
                        </li>

                        <li class="flex items-center gap-3 py-3.5">
                            <span class="flex items-center justify-center w-10 h-10 shrink-0 rounded-2xl bg-blue-50 text-[#2563EB]">
                                <x-heroicon-o-calendar-days class="w-5 h-5" />
                            </span>
                            <span class="text-sm sm:text-[15px] font-medium text-[#0F172A]">Jadwal Ronda</span>
                        </li>

                        <li class="flex items-center gap-3 py-3.5">
                            <span class="flex items-center justify-center w-10 h-10 shrink-0 rounded-2xl bg-blue-50 text-[#2563EB]">
                                <x-heroicon-o-users class="w-5 h-5" />
                            </span>
                            <span class="text-sm sm:text-[15px] font-medium text-[#0F172A]">Monitoring Kehadiran</span>
                        </li>

                    </ul>

                </div>

                {{-- ================= ACTION BUTTONS ================= --}}
                <div class="w-full mt-8 flex flex-col gap-3 animate-[fadeInUp_0.6s_ease-out_0.6s_both]">

                    <a href="{{ route('register') }}"
                        class="group relative overflow-hidden w-full inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#2563EB] to-[#3B82F6] text-white font-semibold text-base py-4 shadow-xl shadow-blue-600/25 transition-all duration-300 ease-in-out hover:scale-[1.03] hover:shadow-2xl active:scale-[0.98]">
                        <span
                            class="absolute inset-0 scale-0 rounded-full bg-white/25 group-active:scale-100 transition-transform duration-500 ease-out"></span>
                        <span class="relative">MASUK</span>
                        <x-heroicon-o-arrow-right class="relative w-5 h-5" />
                    </a>

                    <a href="{{ route('login') }}"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-full border-2 border-[#2563EB]/20 text-[#2563EB] font-semibold text-sm py-3.5 transition-all duration-300 ease-in-out hover:border-[#2563EB] hover:bg-blue-50 hover:scale-[1.02]">
                        <x-heroicon-o-shield-check class="w-4 h-4" />
                        Login Admin
                    </a>

                </div>

            </div>

        </div>

        {{-- ================= BOTTOM INFO ================= --}}
        <div class="absolute inset-x-0 flex flex-col items-center gap-1 animate-[fadeIn_0.8s_ease-out_0.9s_both]"
            style="bottom: max(1.25rem, env(safe-area-inset-bottom));">
            <p class="text-xs text-[#94A3B8]">Versi 1.0</p>
            <p class="text-xs text-[#94A3B8]">Powered by <span class="font-medium text-[#64748B]">RondaKu</span></p>
        </div>

    </div>

    <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
            overscroll-behavior: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes gradientMove {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }
    </style>

</body>

</html>