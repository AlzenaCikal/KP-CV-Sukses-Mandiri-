<?php

namespace App\Http\Controllers;

use App\Models\MasterService;
use Illuminate\Http\Request;

class MasterServiceController extends Controller
{
    public function index()
    {
        $services = MasterService::all();
        return view('master_service.index', compact('services'));
    }

    public function create()
    {
        return view('master_service.create');
    }

    public function store(Request $request)
    {
        MasterService::create($request->all());
        return redirect()->route('master-service.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = MasterService::findOrFail($id);
        return view('master_service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = MasterService::findOrFail($id);
        $service->update($request->all());
        return redirect()->route('master-service.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        MasterService::destroy($id);
        return redirect()->route('master-service.index')->with('success', 'Data berhasil dihapus');
    }
}
