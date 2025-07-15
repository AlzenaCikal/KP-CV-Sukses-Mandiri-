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

<div class="container">
    <h2>Tambah Transaksi Barang</h2>
    <div class="card">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="barang_id" class="form-label">Nama Barang</label>
                <select name="barang_id" id="barang_id" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">
                        {{ $barang->nama_barang }} ({{ $barang->kategori ?? 'Kategori Tidak Diketahui' }})
                    </option>
                    @endforeach
                </select>
                @error('barang_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga Satuan</label>
                <input type="text" id="harga" class="form-control" readonly>
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

            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" id="total_harga" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('transactions') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let hargaBarang = 0;

    function hitungTotal() {
        const qty = parseInt($('#quantity').val()) || 0;
        $('#total_harga').val(hargaBarang * qty);
    }

    $('#barang_id').on('change', function () {
        const id = $(this).val();
        if (!id) return;

        $.get('/barang/' + id + '/harga', function (data) {
            hargaBarang = data.harga;
            $('#harga').val(hargaBarang);
            hitungTotal();
        });
    });

    $('#quantity').on('input', function () {
        hitungTotal();
    });

    // Jalankan saat form dimuat (optional jika kamu ingin auto-load harga pertama)
    $('#barang_id').trigger('change');
</script>
@endsection
