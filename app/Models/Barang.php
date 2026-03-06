<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'stok',
        'harga',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
