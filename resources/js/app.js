import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import './dashboard';
import "./calendar";
import './petugas-dashboard';

import Chart from 'chart.js/auto';
window.Chart = Chart;
import { Html5QrcodeScanner } from "html5-qrcode";

window.Html5QrcodeScanner = Html5QrcodeScanner;

if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
        navigator.serviceWorker
            .register("/sw.js")
            .then(registration => {
                console.log(
                    "Rondaku Service Worker registered:",
                    registration.scope
                );
            })
            .catch(error => {
                console.error(
                    "Service Worker registration failed:",
                    error
                );
            });
    });
}