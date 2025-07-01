<?php

// namespace App\Exports;

// use App\Models\Service;
// use Maatwebsite\Excel\Concerns\FromCollection;



// class ServiceExport implements FromCollection
// {
//     protected $start, $end, $status;

//     public function __construct($start = null, $end = null, $status = null)
//     {
//         $this->start = $start;
//         $this->end = $end;
//         $this->status = $status;
//     }

//     public function collection()
//     {
//         $query = Service::query();

//         if ($this->start) $query->whereDate('tanggal', '>=', $this->start);
//         if ($this->end) $query->whereDate('tanggal', '<=', $this->end);
//         if ($this->status) $query->where('status', $this->status);

//         return $query->get();
//     }
// }
