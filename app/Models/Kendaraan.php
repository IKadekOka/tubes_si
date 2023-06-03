<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = "kendaraans";
    protected $primaryKey = 'id';
    protected $fillable = [
        "id_supir",
        "nopol_kendaraan",
        "jenis_mobil",
        "status_kendaraan"
    ];
}
