<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\TransactionController;
use App\Models\MasterBarang;

class Transaction extends Model
{
    protected $fillable = [
        'barang_id',
        'type',
        'quantity',
        'total_harga',
        'created_at',
        'updated_at'
    ];

    public function barang()
    {
        return $this->belongsTo(MasterBarang::class, 'barang_id');
    }
}
