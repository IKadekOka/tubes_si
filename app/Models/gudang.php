<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudang extends Model
{
    use HasFactory;
    protected $table ="gudangs";
    protected $primaryKey = 'id';
    protected $fillable = [
        "id_barang",
        "tanggal_masuk",
        "stok_barang",
    ];
}
