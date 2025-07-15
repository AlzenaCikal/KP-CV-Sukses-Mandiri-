<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{   
    public function index(Request $request)
    {
        $search = $request->input('search');

        $transactions = Transaction::with('barang.category')
            ->when($search, function ($query, $search) {
                $query->whereHas('barang', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhereHas('category', function ($qc) use ($search) {
                          $qc->where('name', 'like', "%{$search}%");
                      });
                });
            })
            ->latest()
            ->get();

        return view('transactions', compact('transactions'));
    }

    public function create()
    {
        $barangs = MasterBarang::with('category')->get();
        return view('22', compact('barangs')); // pastikan view-nya sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:master_barang,id',
            'type' => 'required|in:masuk,keluar',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $barang = MasterBarang::findOrFail($request->barang_id);
        $total = $barang->harga * $request->quantity;

        Transaction::create([
            'barang_id'   => $request->barang_id,
            'type'        => $request->type,
            'quantity'    => $request->quantity,
            'total_harga' => $total,
            'created_at'  => $request->date,
            'updated_at'  => now(),
        ]);

        return redirect()->route('transactions')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit(Transaction $transaction)
    {
        $barangs = MasterBarang::with('category')->get();
        return view('edittran', compact('transaction', 'barangs'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'barang_id' => 'required|exists:master_barang,id',
            'type'      => 'required|in:masuk,keluar',
            'quantity'  => 'required|integer|min:1',
            'date'      => 'required|date',
        ]);

        $barang = MasterBarang::findOrFail($request->barang_id);
        $total = $barang->harga * $request->quantity;

        $transaction->update([
            'barang_id'   => $request->barang_id,
            'type'        => $request->type,
            'quantity'    => $request->quantity,
            'total_harga' => $total,
            'created_at'  => $request->date,
        ]);

        return redirect()->route('transactions')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function grafikData()
    {
        $barangMasuk = DB::table('transactions')
            ->selectRaw('DATE(created_at) as tanggal, SUM(quantity) as total')
            ->where('type', 'masuk')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $barangKeluar = DB::table('transactions')
            ->selectRaw('DATE(created_at) as tanggal, SUM(quantity) as total')
            ->where('type', 'keluar')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return response()->json([
            'masuk' => $barangMasuk,
            'keluar' => $barangKeluar,
        ]);
    }
}
