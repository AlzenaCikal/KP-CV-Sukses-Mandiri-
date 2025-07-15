<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function index()
    {
        $barangs = MasterBarang::all();
        return view('master_barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('master_barang.create');
    }

    public function store(Request $request)
    {
        MasterBarang::create($request->all());
        return redirect()->route('master-barang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = MasterBarang::findOrFail($id);
        return view('master_barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = MasterBarang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('master-barang.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        MasterBarang::destroy($id);
        return redirect()->route('master-barang.index')->with('success', 'Data berhasil dihapus');
    }
}

