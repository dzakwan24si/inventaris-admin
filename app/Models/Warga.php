<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'wargas';

    // Menentukan primary key
    protected $primaryKey = 'warga_id';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email'
    ];
}
