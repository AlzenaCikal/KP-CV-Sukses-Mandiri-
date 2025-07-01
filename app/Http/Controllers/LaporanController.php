<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
// use App\Exports\ServiceExport;
// use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $data = Service::query();

        if ($request->start_date) {
            $data->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $data->whereDate('tanggal', '<=', $request->end_date);
        }

        if ($request->status) {
            $data->where('status', $request->status);
        }

        $services = $data->get();

        return view('laporan', compact('services'));
    }

    // public function exportExcel(Request $request)
    // {
    //     return Excel::download(new ServiceExport(
    //         $request->start_date,
    //         $request->end_date,
    //         $request->status
    //     ), 'laporan-service.xlsx');
    // }

    public function exportPDF(Request $request)
    {
        $query = Service::query();

        if ($request->start_date) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $data = $query->get();

        $pdf = PDF::loadView('exports/laporan-service', [
            'data' => $data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return $pdf->download('laporan-service.pdf');
    }
}
