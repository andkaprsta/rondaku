import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {

    const chartCanvas = document.getElementById("dashboardChart");

    if (!chartCanvas || !window.dashboardChartData) {
        return;
    }

    new Chart(chartCanvas, {

        type: "bar",

        data: {

            labels: window.dashboardChartData.labels,

            datasets: [{

                label: "Jumlah Absensi",

                data: window.dashboardChartData.data,

                backgroundColor: "#3B82F6",

                borderRadius: 8,

                borderSkipped: false,

                maxBarThickness: 40

            }]

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

                y: {

                    beginAtZero: true,

                    ticks: {

                        precision: 0,

                        stepSize: 1

                    }

                },

                x: {

                    grid: {

                        display: false

                    }

                }

            }

        }

    });

});