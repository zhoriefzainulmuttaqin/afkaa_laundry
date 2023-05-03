<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    use HasFactory;
    protected $table = "callback";
    protected $primaryKey = 'id_callback';

    protected $fillable = [
        "orderId",
        "id_santri",
        "nominal",
        "kode_jenis_transaksi",
        "keterangan",
        "status",
        "created_at",
        "updated_at",
    ];
}
