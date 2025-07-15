@extends('layout.app')

@section('content')
<style>
    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .table {
        border-radius: 6px;
        overflow: hidden;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead th:first-child {
        border-top-left-radius: 6px;
    }

    .table thead th:last-child {
        border-top-right-radius: 6px;
    }

    .table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 6px;
    }

    .table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 6px;
    }

    .table thead th {
        background-color: #1e4db7 !important;
        color: #ffffff !important;
        border: 1px solid #2c2f45;
    }

    .table tbody td {
        background-color: #ffffff;
        color: #000000;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }
</style>

<br>
<div class="container">
    <h2 class="mb-3">Daftar Transaksi Barang</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3" style="margin-left: 25px;">+ Tambah Transaksi</a>

    <div class="card">
        <form action="{{ route('transactions') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama barang atau kategori..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jenis Transaksi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Action</th>
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
                        <td>
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
