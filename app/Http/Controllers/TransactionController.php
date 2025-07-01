<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{   
public function index(Request $request)
{
    $search = $request->input('search');

    $transactions = Transaction::with('item.category')
        ->when($search, function ($query, $search) {
            $query->whereHas('item', function ($q) use ($search) {
                $q->where('quantity', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($qc) use ($search) {
                      $qc->where('quantity', 'like', "%{$search}%");
                  });
            });
        })
        ->latest()
        ->get();

    return view('transactions', compact('transactions'));
}

public function create()
{
    $items = Item::with('category')->get();
    return view('22', compact('items'));
}

public function store(Request $request)
{
     $request->validate([
            'item_id' => 'required|exists:items,id',
            'type' => 'required|in:masuk,keluar',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        Transaction::create([
            'item_id' => $request->item_id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'created_at' => $request->date,
            'updated_at' => now(),
        ]);


        return redirect()->route('transactions')->with('success', 'Transaksi berhasil ditambahkan!');
}

public function edit(Transaction $transaction)
{
    $items = Item::with('category')->get();
    return view('edittran', compact('transaction', 'items'));
}

public function update(Request $request, Transaction $transaction)
{
    $request->validate([
        'item_id' => 'required|exists:items,id',
        'type' => 'required|in:masuk,keluar',
        'quantity' => 'required|integer|min:1',
        'date' => 'required|date',
    ]);

    $transaction->update([
        'item_id' => $request->item_id,
        'type' => $request->type,
        'quantity' => $request->quantity,
        'created_at' => $request->date,
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