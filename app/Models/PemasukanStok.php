<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanStok extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_stok';

    protected $fillable = [
        'item_id',
        'jumlah_masuk',
        'tanggal_masuk',
        'keterangan',
    ];

    // Tambahkan casting tanggal_masuk jadi datetime
    protected $casts = [
        'tanggal_masuk' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
