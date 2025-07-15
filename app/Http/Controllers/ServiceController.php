<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\MasterService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('layanan')->latest()->get(); // include relasi layanan
        return view('services', compact('services'));
    }

    public function create()
    {
        $masterServices = MasterService::all(); // ambil data master service
        return view('serviscreate', compact('masterServices'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_customer' => 'required|string|max:255',
        'layanan_id' => 'required|exists:master_service,id',
        'status' => 'required|in:pending,in_progress,completed,cancelled',
        'tanggal' => 'required|date',
    ]);

    // Ambil data layanan dari master_service
    $layanan = MasterService::findOrFail($request->layanan_id);

    // Simpan ke tabel services
    Service::create([
        'nama_customer' => $request->nama_customer,
        'layanan_id' => $request->layanan_id,
        'status' => $request->status,
        'tanggal' => $request->tanggal,
        'jenis_mesin' => $layanan->jenis_mesin,
        'jasa_perbaikan' => $layanan->nama_service,
        'estimasi' => $layanan->estimasi,
    ]);

    return redirect()->route('services')->with('success', 'Data service berhasil ditambahkan!');
}

    public function edit(Service $service)
    {
        $masterServices = MasterService::all();
        return view('servisedit', compact('service', 'masterServices'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'layanan_id' => 'required|exists:master_service,id',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'tanggal' => 'required|date',
        ]);

        $service->update([
            'nama_customer' => $request->nama_customer,
            'layanan_id' => $request->layanan_id,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('services')->with('success', 'Data service berhasil diperbarui!');
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
