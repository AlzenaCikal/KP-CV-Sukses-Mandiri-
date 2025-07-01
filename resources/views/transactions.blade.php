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
<br>
<div class="container">
    <h2 class="mb-3">Daftar Transaksi Barang</h2>

    
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Transaksi -->
    <!-- <a href="" class="btn btn-primary mb-3">+ Tambah Transaksi</a> -->
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3" style="margin-left: 25px;">+ Tambah Transaksi</a>
<div class="card">
    <form action="{{ route('transactions') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari nama barang atau kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>

    <!-- Tabel Transaksi -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Kategori Ukuran</th>
                <th>Jenis Transaksi</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
       <tbody>
    @forelse($transactions as $index => $transaction)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $transaction->item->name }}</td>
            <td>{{ $transaction->item->category->name ?? 'Tidak Ada Kategori' }}</td>
            <td>
                <span class="badge bg-{{ $transaction->type == 'masuk' ? 'success' : 'danger' }}">
                    {{ ucfirst($transaction->type) }}
                </span>
            </td>
            <td>{{ $transaction->quantity }}</td>
            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y') }}</td>
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
            <td colspan="6" class="text-center">Belum ada transaksi</td>
        </tr>
    @endforelse
</tbody>
    </table>
</div>
</div>
@endsection
