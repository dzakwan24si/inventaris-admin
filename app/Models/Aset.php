<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'kategori',
        'tanggal_perolehan',
        'nilai_perolehan',
        'kondisi',
        'lokasi',
        'penanggung_jawab',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_perolehan' => 'date',
        'nilai_perolehan' => 'decimal:2'
    ];
}