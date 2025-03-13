<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon', 'alamat', 'nama_ibu', 'nama_ayah', 'daerah'];


    public function absensi()
    {
        return $this->hasMany(AbsensiAnggota::class);
    }
}
