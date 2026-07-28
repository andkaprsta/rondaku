<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                <x-heroicon-o-qr-code class="w-6 h-6" />
            </div>
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Scan QR Absensi
                </h2>
                <p class="text-sm text-[#64748B]">
                    Arahkan kamera ke QR Code Pos Ronda untuk melakukan absensi.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#F8FAFC] py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ============================= --}}
                {{-- LEFT COLUMN : SCANNER --}}
                {{-- ============================= --}}
                <div class="lg:col-span-2">

                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">

                        {{-- Header --}}
                        <div class="flex items-center gap-2 px-6 sm:px-8 pt-6 sm:pt-8">
                            <x-heroicon-o-camera class="w-5 h-5 text-[#2563EB]" />
                            <h3 class="text-lg font-bold text-gray-900">
                                Scanner QR
                            </h3>
                        </div>

                        {{-- Body --}}
                        <div class="p-6 sm:p-8">

                            <div class="relative max-w-[450px] mx-auto rounded-xl overflow-hidden border-2 border-[#E2E8F0] bg-gray-900 scanner-frame">

                                <div id="reader" class="rounded-xl overflow-hidden"></div>

                                {{-- Pure CSS laser scan line --}}
                                <div class="laser-line"></div>

                            </div>

                        </div>

                        {{-- Footer : Scanner status --}}
                        <div class="border-t border-[#E2E8F0] bg-[#F8FAFC] px-6 sm:px-8 py-4 text-center">

                            <div id="scan-result" class="text-sm font-medium text-[#64748B]">
                                Menunggu QR Code...
                            </div>

                        </div>

                    </div>

                </div>


                <div id="scan-loading"
                    class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden
           flex items-center justify-center z-50">

                    <div
                        class="bg-white rounded-3xl shadow-2xl w-[340px] p-8 text-center
               transition-all duration-300">

                        {{-- Spinner --}}
                        <div id="loading-spinner"
                            class="mx-auto w-16 h-16 border-4 border-[#2563EB]
                   border-t-transparent rounded-full animate-spin">
                        </div>

                        {{-- Check Icon --}}
                        <div id="loading-check"
                            class="hidden mx-auto w-16 h-16 rounded-full
           bg-emerald-100
           flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-9 h-9 text-emerald-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="3"
                                    d="M5 13l4 4L19 7" />

                            </svg>

                        </div>

                        <h3
                            id="loading-title"
                            class="mt-6 text-xl font-bold text-gray-900">

                            Memverifikasi QR...

                        </h3>

                        <p
                            id="loading-text"
                            class="mt-2 text-sm text-[#64748B]">

                            Mohon tunggu sebentar.

                        </p>

                    </div>

                </div>


                {{-- ============================= --}}
                {{-- RIGHT COLUMN : INFO --}}
                {{-- ============================= --}}
                <div class="space-y-6">

                    {{-- CARD : PETUNJUK --}}
                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 p-6">

                        <div class="flex items-center gap-2 mb-4">
                            <x-heroicon-o-light-bulb class="w-5 h-5 text-[#2563EB]" />
                            <h3 class="text-sm font-bold text-gray-900">
                                Petunjuk Scan
                            </h3>
                        </div>

                        <ul class="space-y-3 text-sm text-[#64748B]">
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-sun class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                Pastikan pencahayaan cukup.
                            </li>
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-eye class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                QR terlihat jelas di kamera.
                            </li>
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-arrows-pointing-in class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                Jangan terlalu jauh dari QR Code.
                            </li>
                            <li class="flex items-start gap-2">
                                <x-heroicon-o-clock class="w-4 h-4 text-[#2563EB] mt-0.5 shrink-0" />
                                QR hanya berlaku pukul 22.00 - 04.00 WIB.
                            </li>
                        </ul>

                    </div>

                    {{-- CARD : KEAMANAN --}}
                    <div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 p-6">

                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#2563EB] flex items-center justify-center shrink-0">
                                <x-heroicon-o-shield-check class="w-5 h-5" />
                            </div>
                            <p class="text-sm text-[#64748B]">
                                QR hanya dapat digunakan oleh petugas yang memiliki jadwal ronda.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- Laser scan animation (pure CSS, no JS logic changed) --}}
    <style>
        .scanner-frame {
            aspect-ratio: 1 / 1;
        }

        .laser-line {
            position: absolute;
            left: 4%;
            width: 92%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #2563EB 20%, #60A5FA 50%, #2563EB 80%, transparent);
            box-shadow: 0 0 8px 1px rgba(37, 99, 235, 0.7);
            top: 4%;
            animation: laser-move 2.2s ease-in-out infinite;
            pointer-events: none;
            z-index: 20;
        }

        @keyframes laser-move {
            0% {
                top: 4%;
            }

            50% {
                top: 94%;
            }

            100% {
                top: 4%;
            }
        }

        #scan-result .spinner {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid #E2E8F0;
            border-top-color: #2563EB;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            vertical-align: middle;
            margin-right: 6px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes popSuccess {
            0% {
                transform: scale(.3);
                opacity: 0;
            }

            60% {
                transform: scale(1.15);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        .animate-pop {
            animation: popSuccess .45s ease;
        }
    </style>

    {{-- CDN --}}
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
        let sudahScan = false;

        function onScanSuccess(decodedText) {

            if (sudahScan) return;

            sudahScan = true;

            document
                .getElementById("scan-loading")
                .classList.remove("hidden");

            // getar HP
            if (navigator.vibrate) {
                navigator.vibrate(120);
            }

            // bunyi beep
            document.getElementById("scan-beep").play();

            document.getElementById("loading-title").innerHTML =
                "Memverifikasi QR...";

            document.getElementById("loading-text").innerHTML =
                "Mohon tunggu sebentar.";

            setTimeout(() => {

                document
                    .getElementById("loading-spinner")
                    .classList.add("hidden");

                let check = document.getElementById("loading-check");

                check.classList.remove("hidden");

                check.classList.add("animate-pop");

                document.getElementById("loading-title").innerHTML =
                    "QR Berhasil Dipindai";

                document.getElementById("loading-text").innerHTML =
                    "Absensi sedang diproses...";

            }, 800);

            setTimeout(() => {

                window.location.href = decodedText;

            }, 1800);

        }

        function onScanFailure(error) {}

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                rememberLastUsedCamera: true,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            },
            false
        );

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>

    <audio id="scan-beep" preload="auto">
        <source src="{{ asset('sounds/beep.wav') }}" type="audio/wav">
    </audio>
</x-app-layout>