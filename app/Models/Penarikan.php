<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'penarikan';
    protected $primaryKey = 'id_penarikan';

    protected $fillable = [
        'id_santri',
        'id_order',
        'jml_penarikan	',
        'tgl_penarikan',
    ];
}
