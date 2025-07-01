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

<div class="container mt-4">
    <h2>Tambah Jasa Service Mesin</h2>
    
<div class="card">
    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_customer" class="form-label">Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis_mesin" class="form-label">Jenis Mesin</label>
            <input type="text" name="jenis_mesin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jasa_perbaikan" class="form-label">Jasa Perbaikan</label>
            <input type="text" name="jasa_perbaikan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="in_progress">Sedang Dikerjakan</option>
                <option value="completed">Selesai</option>
                <option value="cancelled">Dibatalkan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estimasi" class="form-label">Estimasi</label>
            <input type="text" name="estimasi" class="form-control" placeholder="Contoh: 3 hari">
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('services') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>
@endsection
