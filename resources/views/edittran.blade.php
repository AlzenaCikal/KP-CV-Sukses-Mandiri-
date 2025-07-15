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

    .card h2 {
        font-size: 22px;
        margin-bottom: 20px;
        color: #333;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 10px;
    }
</style>

<div class="container mt-4">
    <h2>Edit Transaksi</h2>
    <div class="card">
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="barang_id" class="form-label">Nama Barang</label>
                <select name="barang_id" id="barang_id" class="form-control" required>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ $barang->id == $transaction->barang_id ? 'selected' : '' }}>
                            {{ $barang->nama_barang }} ({{ $barang->kategori ?? 'Tanpa Kategori' }})
                        </option>
                    @endforeach
                </select>
                @error('barang_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Transaksi</label>
                <select name="type" class="form-control" required>
                    <option value="masuk" {{ $transaction->type == 'masuk' ? 'selected' : '' }}>Masuk</option>
                    <option value="keluar" {{ $transaction->type == 'keluar' ? 'selected' : '' }}>Keluar</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="quantity" class="form-control" value="{{ $transaction->quantity }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update Transaksi</button>
            <a href="{{ route('transactions') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
