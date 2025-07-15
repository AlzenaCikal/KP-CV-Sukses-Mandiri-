@extends('layout.app')

@section('content')
<style>
    .cardd {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .card h2 {
        font-size: 22px;
        margin-bottom: 20px;
        color: #333;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 10px;
    }

    canvas {
        width: 100% !important;
        height: auto !important;
    }

    .card-status {
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .card-status:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .card-status .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .card-status .card-text {
        font-size: 1.1rem;
        margin-top: 8px;
    }
</style>
<div class="container">

    <h1>Laporan Service dan Transaction</h1><br>
    <div class="card">
        <h3>Laporan Service</h3>
        <form method="GET" action="{{ route('laporan') }}">
                    <a href="{{ route('laporan.service.perbulan') }}" class="btn btn-success">Cetak Laporan Service Bulanan</a>
                    <a href="{{ route('laporan.service.perminggu') }}" class="btn btn-primary">Cetak Laporan Service Mingguan</a>
        </form>

        <br>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>Harga</th>

                </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $service->nama_customer }}</td>
                    <td>{{ $service->layanan->nama_service ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $service->status == 'completed' ? 'success' : ($service->status == 'in_progress' ? 'warning' : ($service->status == 'cancelled' ? 'danger' : 'primary')) }}">
                            {{ ucfirst(str_replace('_', ' ', $service->status)) }}
                        </span>
                    </td>
                    <td>Rp {{ number_format($service->layanan->harga ?? 0, 0, ',', '.') }}</td>

                </tr>
                @endforeach
            </tbody>
        </table> <br>
        </div><br><br>

    <div class="cardd"><br>
    <h3>Laporan Transaksi Barang</h3><br>
        <a href="{{ route('laporan.perbulan') }}" class="btn btn-success">Cetak Laporan Bulanan (PDF)</a>
        <a href="{{ route('laporan.perminggu') }}" class="btn btn-primary">Cetak Laporan Mingguan (PDF)</a><br>
        <table class="table table-bordered table-striped"><br>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jenis Transaksi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $transaction->barang->kategori ?? 'Tidak Ada Kategori' }}</td>
                    <td>
                        <span class="badge bg-{{ $transaction->type == 'masuk' ? 'success' : 'danger' }}">
                            {{ ucfirst($transaction->type) }}
                        </span>
                    </td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y') }}</td>
                    <td>{{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table> <br>
        <br>
    </div>
</div><br><br>
@endsection