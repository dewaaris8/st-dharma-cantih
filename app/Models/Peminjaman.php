<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    protected $table = 'peminjaman';

    protected $fillable = [
        'inventaris_id',
        'jumlah_dipinjam',
        'status',
        'tanggal_pinjam',
        'tanggal_kembali',
        'durasi_pinjam',
        'nama_peminjam',
        'nomor_peminjam'
    ];

    public function inventaris()
    {
        return $this->belongsTo(InventarisBarang::class, 'inventaris_id');
    }
}

