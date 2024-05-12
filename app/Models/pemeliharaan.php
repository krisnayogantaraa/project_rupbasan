<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeliharaan extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_baran',
        'nama_baran',
        'nomor_register',
        'jumlah',
        'tgl_pemeliharaan',
        'kondisi',
        'tanda_tangan_internal',
        'tanda_tangan_eksternal',
        'nama_atasan_petugas_pemeliharaan',
        'foto_1',
        'foto_2',
        'keterangan',
    ];
}
