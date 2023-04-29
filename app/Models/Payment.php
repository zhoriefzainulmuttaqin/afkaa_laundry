<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'laundry_payment';
    protected $primaryKey = 'id_payment';

    protected $fillable = [
        'id_santri',
        'foto_santri	',
        'payment_method',
        'no_transaction',
        'id_saldo',
        'date',
        'total_price'
    ];
}
