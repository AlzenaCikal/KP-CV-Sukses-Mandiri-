<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
   public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

    Item::create($request->all());
    return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
    }

}
