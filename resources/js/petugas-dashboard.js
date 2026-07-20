document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById("chartAbsensiPetugas");

    if (!canvas) return;

    new Chart(canvas, {

        type: "bar",

        data: {

            labels: window.petugasLabels,

            datasets: [

                {

                    label: "Jumlah Absensi",

                    data: window.petugasData,

                    backgroundColor: "#3B82F6",

                    borderRadius: 8,

                    borderSkipped: false,

                    maxBarThickness: 40

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            },

            scales: {

                x: {

                    grid: {

                        display: false

                    }

                },

                y: {

                    beginAtZero: true,

                    ticks: {

                        precision: 0,

                        stepSize: 1

                    }

                }

            }

        }

    });

});