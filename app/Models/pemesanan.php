<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = "pemesanans";
    protected $primaryKey = 'id';
    protected $fillable = [
        "id_outlet",
        "id_barang",
        "jumlah_pesanan",
        "total_harga",
    ];
}
