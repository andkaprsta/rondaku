<div id="toast-container"
    class="fixed top-5 right-5 z-50 space-y-3">

    @if(session('success'))
    <div
        class="toast flex items-center gap-3 bg-white border-l-4 border-emerald-500 rounded-xl shadow-xl px-5 py-4 min-w-[320px]">

        <div
            class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">

            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-600" />

        </div>

        <div>

            <p class="font-semibold text-gray-900">

                Berhasil

            </p>

            <p class="text-sm text-gray-600">

                {{ session('success') }}

            </p>

        </div>

    </div>
    @endif

    @if(session('error'))
    <div
        class="toast flex items-center gap-3 bg-white border-l-4 border-rose-500 rounded-xl shadow-xl px-5 py-4 min-w-[320px]">

        <div
            class="w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center">

            <x-heroicon-o-x-circle class="w-6 h-6 text-rose-600" />

        </div>

        <div>

            <p class="font-semibold text-gray-900">

                Gagal

            </p>

            <p class="text-sm text-gray-600">

                {{ session('error') }}

            </p>

        </div>

    </div>
    @endif

</div>

<style>
    .toast {

        animation: slideIn .4s ease;

    }

    @keyframes slideIn {

        from {

            transform: translateX(100%);
            opacity: 0;

        }

        to {

            transform: translateX(0);
            opacity: 1;

        }

    }

    .toast.hide {

        animation: slideOut .4s ease forwards;

    }

    @keyframes slideOut {

        to {

            transform: translateX(120%);
            opacity: 0;

        }

    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const toast = document.querySelector(".toast");

        if (!toast) return;

        setTimeout(() => {

            toast.classList.add("hide");

        }, 3000);

    });
</script>