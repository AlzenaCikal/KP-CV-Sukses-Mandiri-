<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class MasterService extends Model
{
    use HasFactory;

    protected $table = 'master_service';

    protected $fillable = [
        'nama_service',
        'jenis_mesin',
        'estimasi',
        'harga',
    ];

    // app/Models/ServiceTransaction.php
    // app/Models/MasterService.php
    public function transactions()
    {
        return $this->hasMany(Service::class, 'layanan_id');
    }
}
