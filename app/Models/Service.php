<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Service.php

class Service extends Model
{
    protected $fillable = [
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
}
