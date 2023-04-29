<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_callback';
    protected $table = "callback";

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
