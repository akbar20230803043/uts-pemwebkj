<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $table = 'supirs'; // Pastikan nama tabel sesuai dengan migrasi

    protected $fillable = [
        'nama',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'no_sim',
        'jenis_sim',
        'sim_terbit',
        'sim_expired',
        'status',
        'tanggal_bergabung',
        'kendaraan_dikuasai',
        'pengalaman',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'sim_terbit' => 'date',
        'sim_expired' => 'date',
        'tanggal_bergabung' => 'date',
        'pengalaman' => 'integer',
    ];
}
