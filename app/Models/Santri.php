<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'santri';
    protected $primaryKey = 'id_santri';

    protected $fillable = [
        'id_orangtua',
        'foto_santri	',
        'nama_santri',
        'nis',
        'nisn',
        'asal_sekolah',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'nik',
        'no_kk',
    ];
}
