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
    
    <h1>Laporan Service</h1>
    <div class="card">
    <form method="GET" action="{{ route('laporan') }}">
        <div class="row mb-3">
            <div class="col-md-3">
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">-- Semua Status --</option>
                    <option value="pending">Pending</option>
                    <option value="in_progres">Sedang Dikerjakan</option>
                    <option value="complated">Selesai</option>
                    <option value="cencelled">Dibatalkan</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">Filter</button>
                <a href="{{ route('laporan.export.excel', request()->all()) }}" class="btn btn-success">Export Excel</a>
                <a href="{{ route('laporan.export.pdf', request()->all()) }}" class="btn btn-danger">Export PDF</a>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Mesin</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->nama_customer }}</td>
                <td>{{ $service->jenis_mesin }}</td>
                <td>{{ ucfirst($service->status) }}</td>
                <td>{{ $service->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection