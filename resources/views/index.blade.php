@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<br>

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Grafik Barang</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* ===== CSS Dashboard Grafik ===== */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0px;
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
            max-width: 900px;
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
</head>

<body>
    <h1 style="margin-left: 20px;">Dashboard</h1>
    <div class="cardd">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-status text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pending</h5>
                        <p class="card-text">{{ $statusCounts['pending'] ?? 0 }} Layanan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-status text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dikerjakan</h5>
                        <p class="card-text">{{ $statusCounts['in_progress'] ?? 0 }} Layanan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-status text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Selesai</h5>
                        <p class="card-text">{{ $statusCounts['completed'] ?? 0 }} Layanan</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-status text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dibatalkan</h5>
                        <p class="card-text">{{ $statusCounts['cancelled'] ?? 0 }} Layanan</p>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="card">
            <h2>Grafik Barang Masuk & Keluar</h2>
            <canvas id="grafikBarang"></canvas>
        </div>
    </div>
    <script>
        fetch('/grafik-data')
            .then(response => response.json())
            .then(data => {
                const labels = data.masuk.map(item => item.tanggal);
                const masuk = data.masuk.map(item => item.total);
                const keluar = data.keluar.map(item => item.total);

                // Gabungkan semua data untuk cari nilai maksimum
                const allData = masuk.concat(keluar);
                const maxValue = Math.max(...allData);

                // Cari kelipatan 100/500/1000 terdekat sebagai batas atas
                const maxY = Math.ceil(maxValue / 100) * 100; // naik kelipatan 500

                const ctx = document.getElementById('grafikBarang').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Barang Masuk',
                                data: masuk,
                                borderColor: 'green',
                                backgroundColor: 'rgba(0,128,0,0.2)',
                                fill: true,
                                tension: 0.4
                            },
                            {
                                label: 'Barang Keluar',
                                data: keluar,
                                borderColor: 'red',
                                backgroundColor: 'rgba(255,0,0,0.2)',
                                fill: true,
                                tension: 0.4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Statistik Barang per Tanggal'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: maxY, // <- max dinamis
                                ticks: {
                                    stepSize: Math.ceil(maxY / 5) // agar tetap proporsional
                                },
                                title: {
                                    display: true,
                                    text: 'Jumlah Barang'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            }
                        }
                    }
                });
            });
    </script>

</body>

</html>

@endsection