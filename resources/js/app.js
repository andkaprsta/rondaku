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