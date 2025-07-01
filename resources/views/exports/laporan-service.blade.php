<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Service</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h3>Laporan Service</h3>
    <p>Tanggal: {{ $start_date ?? '-' }} s.d. {{ $end_date ?? '-' }}</p>
    <p>Status: {{ $status ?? 'Semua' }}</p>

    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Mesin</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $s)
            <tr>
                <td>{{ $s->nama_customer }}</td>
                <td>{{ $s->jenis_mesin }}</td>
                <td>{{ ucfirst($s->status) }}</td>
                <td>{{ $s->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
