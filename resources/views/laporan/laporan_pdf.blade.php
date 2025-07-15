<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .judul { font-size: 16px; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="judul">Laporan Transaksi - {{ $periode }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->barang->nama_barang ?? '-' }}</td>
                <td>{{ ucfirst($row->type) }}</td>
                <td>{{ $row->quantity }}</td>
                <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}</td>
                <td class="text-right">Rp {{ number_format($row->total_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><strong>Total Pendapatan</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
