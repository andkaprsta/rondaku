import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {

    const chartCanvas = document.getElementById("absensiChart");

    if (!chartCanvas || typeof dashboardChartData === "undefined") {
        return;
    }

    new Chart(chartCanvas, {

        type: "bar",

        data: {

           labels: dashboardChartData.labels,
            data: dashboardChartData.data,
            
            datasets: [{
                label: "Absensi",
                data: dashboardChartData.data,
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
                    },

                    grid: {
                        color: "#F3F4F6"
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