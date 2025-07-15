<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Transaksi</title>
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
            <td>No. Transaksi</td>
            <td>: {{ $transaksi->id }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ $transaksi->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td>Barang</td>
            <td>: {{ $transaksi->barang->nama_barang }}</td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>: {{ $transaksi->barang->kategori }}</td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>: {{ strtoupper($transaksi->type) }}</td>
        </tr>
        <tr>
            <td>Qty</td>
            <td>: {{ $transaksi->quantity }}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>: Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="center">
        <div class="qr">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=TransaksiID:{{ $transaksi->id }}" alt="QR Code">
        </div>
        <p>Terima kasih atas transaksinya!</p>
    </div>

</body>
</html>
