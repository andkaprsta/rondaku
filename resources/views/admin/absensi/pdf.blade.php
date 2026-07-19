<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Laporan Absensi</title>

    <style>
        body {

            font-family: DejaVu Sans, sans-serif;
            color: #222;
            font-size: 12px;

        }

        .header {

            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 12px;
            margin-bottom: 25px;

        }

        .header h1 {

            margin: 0;
            font-size: 26px;

        }

        .header h3 {

            margin: 3px 0;
            font-weight: normal;

        }

        .header h2 {

            margin-top: 20px;

        }

        .info {

            margin-bottom: 18px;

        }

        .info table {

            width: 100%;

        }

        table {

            width: 100%;
            border-collapse: collapse;

        }

        table th {

            background: #2563eb;
            color: white;
            border: 1px solid #444;
            padding: 8px;

        }

        table td {

            border: 1px solid #444;
            padding: 7px;

        }

        .center {

            text-align: center;

        }

        .footer {

            margin-top: 70px;
            width: 100%;

        }

        .ttd {

            float: right;
            text-align: center;

        }
    </style>

</head>

<body>

    <div class="header">

        <h1>

            RONDAKU

        </h1>

        <h3>

            Sistem Informasi Jadwal Ronda Warga

        </h3>

        <h2>

            LAPORAN ABSENSI PETUGAS

        </h2>

    </div>

    <div class="info">

        <table>

            <tr>

                <td>

                    <b>Tanggal Cetak</b>

                </td>

                <td>

                    :

                    {{ now()->translatedFormat('d F Y H:i') }}

                </td>

            </tr>

            <tr>

                <td>

                    <b>Total Data</b>

                </td>

                <td>

                    :

                    {{ $absensi->count() }}

                    Absensi

                </td>

            </tr>

        </table>

    </div>

    <table>

        <thead>

            <tr>

                <th width="8%">

                    No

                </th>

                <th>

                    Nama Petugas

                </th>

                <th width="25%">

                    Tanggal

                </th>

                <th width="18%">

                    Status

                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($absensi as $item)

            <tr>

                <td class="center">

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $item->jadwal->petugas->name }}

                </td>

                <td class="center">

                    {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->translatedFormat('d F Y') }}

                </td>

                <td class="center">

                    {{ ucfirst($item->status) }}

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="center">

                    Tidak ada data.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">

        <div class="ttd">

            Windunegara RT 2 RW 5,

            {{ now()->translatedFormat('d F Y') }}

            <br><br><br><br>

            <b>

                Admin

            </b>

            <br>

            (__________________)

        </div>

    </div>

</body>

</html>