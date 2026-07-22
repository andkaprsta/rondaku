import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

document.addEventListener("DOMContentLoaded", function () {

    const calendarEl = document.getElementById("calendar");

    if (!calendarEl) return;

    const calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin
        ],

        initialView: "dayGridMonth",

        locale: "id",

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: ""
        },

        height: "auto",

        contentHeight: 500,

        fixedWeekCount: false,

        expandRows: false,

        dayMaxEvents: true,

        events: "/admin/kalender/events",

        dateClick(info) {

            window.location.href =
                "/jadwal/create?tanggal=" + info.dateStr;

        },

        eventClick(info) {

            fetch("/admin/kalender/event/" + info.event.id)

                .then(res => res.json())

                .then(data => {

                    document.getElementById("modalPetugas").innerHTML =
                        data.petugas;

                    document.getElementById("modalTanggal").innerHTML =
                        data.tanggal;

                    document.getElementById("btnEdit").href =
                        "/jadwal/" + data.id + "/edit";

                    document.getElementById("btnDelete").dataset.id =
                        data.id;

                    document
                        .getElementById("eventModal")
                        .classList.remove("hidden");

                    document
                        .getElementById("eventModal")
                        .classList.add("flex");

                });

        }

    });

    calendar.render();

    // Tutup Modal
    document.getElementById("btnClose")
        ?.addEventListener("click", function () {

            document
                .getElementById("eventModal")
                .classList.add("hidden");

            document
                .getElementById("eventModal")
                .classList.remove("flex");

        });

    // Hapus Jadwal
    document.getElementById("btnDelete")
        ?.addEventListener("click", function () {

            const id = this.dataset.id;

            if (!confirm("Yakin ingin menghapus jadwal ini?")) {
                return;
            }

            fetch("/admin/kalender/event/" + id, {

                method: "DELETE",

                headers: {

                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .content,

                    "Accept": "application/json"

                }

            })

                .then(res => res.json())

                .then(() => {

                    location.reload();

                });

        });

});