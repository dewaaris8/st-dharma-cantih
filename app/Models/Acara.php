<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model {
    use HasFactory;
    protected $table = 'acaras';
    protected $fillable = ['nama', 'deskripsi', 'tanggal'];

    public function absensi() {
        return $this->hasMany(AbsensiAnggota::class, 'acara_id');
    }
}
