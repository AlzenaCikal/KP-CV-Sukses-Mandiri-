<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Service</title>
    <style>
        body {
            font-family: monospace;
            font-size: 14px;
            max-width: 300px;
            margin: auto;
        }
        .center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }
        table {
            width: 100%;
        }
        td {
            vertical-align: top;
        }
        .qr {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="center">
        <img src="{{ asset('logo.png') }}" alt="Logo" style="max-width: 80px;"><br>
        <span class="bold">CV Sukses Mandiri</span><br>
        Jl. Contoh Alamat No. 1<br>
        Telp: 021-123456
    </div>

    <div class="line"></div>

    <table>
        <tr>
            <td>No. Service</td>
            <td>: {{ $service->id }}</td>
        </tr>
        <tr>
            <td>Tgl Masuk</td>
            <td>: {{ $service->tanggal->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: {{ $service->nama_customer }}</td>
        </tr>
        <tr>
            <td>Mesin</td>
            <td>: {{ $service->jenis_mesin }}</td>
        </tr>
        <tr>
            <td>Layanan</td>
            <td>: {{ $service->layanan->nama_service }}</td>
        </tr>
        <tr>
            <td>Estimasi</td>
            <td>: {{ $service->estimasi ?? '-' }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: {{ strtoupper(str_replace('_', ' ', $service->status)) }}</td>
        </tr>
        <tr>
            <td>Biaya</td>
            <td>: Rp {{ number_format($service->layanan->harga, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="center">
        <div class="qr">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=ServiceID:{{ $service->id }}" alt="QR Code">
        </div>
        <p>Terima kasih atas kunjungannya!</p>
    </div>

</body>
</html>
