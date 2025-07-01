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


<div class="container mt-4">
    <h3>Daftar Service Mesin</h3>
    {{-- Flash Message --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <br>

    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3" style="margin-left: 25px;">+ Tambah Service</a>
    <div class="card">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Customer</th>
                    <th>Jenis Mesin</th>
                    <th>Jasa Perbaikan</th>
                    <th>Status</th>
                    <th>Estimasi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $service->nama_customer }}</td>
                    <td>{{ $service->jenis_mesin }}</td>
                    <td>{{ $service->jasa_perbaikan }}</td>
                    <td>
                        @if($service->status == 'pending')
                        <span class="badge badge-pending">Pending</span>
                        @elseif($service->status == 'in_progress')
                        <span class="badge badge-inprogress">Sedang Dikerjakan</span>
                        @elseif($service->status == 'completed')
                        <span class="badge badge-completed">Selesai</span>
                        @elseif($service->status == 'cancelled')
                        <span class="badge badge-cancelled">Dibatalkan</span>
                        @else
                        <span class="badge bg-light text-dark">{{ ucfirst(str_replace('_', ' ', $service->status)) }}</span>
                        @endif
                    </td>
                    <td>{{ $service->estimasi ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($service->tanggal)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection