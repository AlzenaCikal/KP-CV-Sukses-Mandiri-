<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterService;

// app/Models/Service.php

class Service extends Model
{
   protected $fillable = [
    'layanan_id',
    'nama_customer',
    'jenis_mesin',
    'jasa_perbaikan',
    'status',
    'estimasi',
    'tanggal',
];


    protected $casts = [
        'tanggal' => 'date', // agar otomatis jadi Carbon
    ];

    // app/Models/ServiceTransaction.php
    public function layanan()
    {
        return $this->belongsTo(MasterService::class, 'layanan_id');
    }
}
