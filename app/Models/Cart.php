<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'laundry_cart';
    protected $primaryKey = 'id_cart';

    protected $fillable = [
        'id_staf',
        'id_item',
        'qty',
        'subtotal',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_item');
    }
}
