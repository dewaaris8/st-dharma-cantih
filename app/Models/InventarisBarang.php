<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisBarang extends Model
{
    use HasFactory;
    protected $table = 'inventaris_barangs';
    protected $fillable = ['nama_barang', 'jumlah', 'catatan'];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}

