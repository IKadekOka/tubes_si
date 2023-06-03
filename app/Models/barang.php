<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    protected $primayKey='id';
    protected $fillable = [
        "id_kategori",
        "nama_barang",
        "harga_barang"
    ];
}
