<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('services', compact('services'));
    }

    public function create()
    {
        return view('serviscreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'jenis_mesin' => 'required|string|max:255',
            'jasa_perbaikan' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'estimasi' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Service::create($request->all());

        return redirect()->route('services')->with('success', 'Data service berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('servisedit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'jenis_mesin' => 'required|string|max:255',
            'jasa_perbaikan' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'estimasi' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $service->update($request->all());

        return redirect()->route('services')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services')->with('success', 'Data service berhasil dihapus!');
    }

    public function dashboard()
    {
        $statusCounts = Service::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('index', compact('statusCounts'));
    }
}
