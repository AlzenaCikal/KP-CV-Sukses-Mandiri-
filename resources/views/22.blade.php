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
    <h2>Tambah Transaksi Barang</h2>
        <div class="card">
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="item_id" class="form-label">Nama Barang</label>
            <select name="item_id" id="item_id" class="form-control" required>
                <option value="" disabled selected>-- Pilih Barang --</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }} ({{ $item->category->name ?? 'Kategori Tidak Diketahui' }})
                    </option>
                @endforeach
            </select>
            @error('item_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Jenis Transaksi</label>
            <select name="type" id="type" class="form-control" required>
                <option value="masuk">Barang Masuk</option>
                <option value="keluar">Barang Keluar</option>
            </select>
            @error('type')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" required>
            @error('date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transactions') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>
@endsection
