<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Scan QR Absensi
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-xl mx-auto">

            <div class="bg-white rounded-2xl shadow-lg p-6">

                <h3 class="text-lg font-semibold text-center mb-6">

                    Arahkan kamera ke QR Code

                </h3>

                <div id="reader" class="rounded-xl overflow-hidden"></div>

                <div id="scan-result" class="mt-5 text-center text-sm text-gray-600">

                    Menunggu QR Code...

                </div>

            </div>

        </div>

    </div>

    {{-- CDN --}}
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
        let sudahScan = false;

        function onScanSuccess(decodedText) {

            if (sudahScan) return;

            sudahScan = true;

            document.getElementById("scan-result").innerHTML =
                "<span class='text-green-600 font-semibold'>QR berhasil dipindai, mengalihkan...</span>";

            html5QrcodeScanner.clear();

            setTimeout(() => {
                window.location.href = decodedText;
            }, 500);

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
</x-app-layout>