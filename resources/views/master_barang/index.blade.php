@extends('layout.app')
@section('content')
<style>
    .badge-pending {
        background-color: rgb(31, 142, 240);
        color: white;
    }

    .badge-inprogress {
        background-color: rgb(253, 209, 13);
        color: white;
    }

    .badge-completed {
        background-color: #28a745;
        color: white;
    }

    .badge-cancelled {
        background-color: #dc3545;
        color: white;
    }



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

    .table {
        border-radius: 6px;
        overflow: hidden;
        border-collapse: separate;
        /* ini penting untuk radius bekerja */
        border-spacing: 0;
        /* hilangkan jarak antar sel */
    }

    /* Header sudut kiri atas dan kanan atas */
    .table thead th:first-child {
        border-top-left-radius: 6px;
    }

    .table thead th:last-child {
        border-top-right-radius: 6px;
    }

    /* Baris terakhir: sudut kiri bawah dan kanan bawah */
    .table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 6px;
    }

    .table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 6px;
    }


    .table thead th {
        background-color: #1e4db7 !important;
        /* Warna gelap untuk header */
        color: #ffffff !important;
        /* Teks putih */
        border: 1px solid #2c2f45;
    }

    .table tbody td {
        background-color: #ffffff;
        /* Warna body tetap putih */
        color: #000000;

    }

    .table-bordered {

        border: 1px solid #dee2e6;
    }
</style>
<div class="container">
    <h3>Data Master Barang</h3>
    <a href="{{ route('master-barang.create') }}" class="btn btn-primary" style="margin-left: 25px;">+ Tambah Barang</a><BR></BR>
    <div class="card">
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('master-barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('master-barang.destroy', $barang->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
