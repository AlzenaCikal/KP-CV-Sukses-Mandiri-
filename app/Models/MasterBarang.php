<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'master_barang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'harga',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori');
    }
}

