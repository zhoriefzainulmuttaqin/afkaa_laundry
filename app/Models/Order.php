<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'laundry_order';
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'no_order',
        'order_date	',
    ];
}
