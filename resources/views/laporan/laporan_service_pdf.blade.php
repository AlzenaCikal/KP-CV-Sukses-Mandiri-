<!DOCTYPE html>
<html>
<head>
    <title>Laporan Service</title>
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
    <div class="judul">Laporan Service - {{ $periode }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Jenis Mesin</th>
                <th>Jasa</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->nama_customer }}</td>
                <td>{{ $row->jenis_mesin }}</td>
                <td>{{ $row->layanan->nama_service ?? '-' }}</td>
                <td class="text-right">Rp {{ number_format($row->layanan->harga ?? 0, 0, ',', '.') }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $row->status)) }}</td>
                <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Total Pendapatan</strong></td>
                <td class="text-right" colspan="3"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
