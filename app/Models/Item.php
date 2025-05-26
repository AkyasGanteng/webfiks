<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori',
        'stok',
        'harga_beli',
        'harga_jual',
        'deskripsi',
        'tanggal_masuk',
        'tanggal_kadaluarsa',
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_kadaluarsa' => 'date',
    ];

    // Relasi ke pemasukan stok
    public function pemasukanStok()
    {
        return $this->hasMany(PemasukanStok::class, 'items_id');
    }

   
}
