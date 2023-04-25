<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'laundry_items';
    protected $primaryKey = 'id_item';

    protected $fillable = [
        'foto',
        'nama',
        'harga',
    ];
}
