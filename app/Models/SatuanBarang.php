<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;

    protected $table = 'tabel_satuan_barang';
    protected $guarded = [];
    protected $fillable = [
        'kode',
        'nama',
    ];
}
