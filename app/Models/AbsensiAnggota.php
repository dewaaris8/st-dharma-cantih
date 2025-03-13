<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiAnggota extends Model
{
    use HasFactory;

    protected $fillable = ['anggota_id', 'tanggal', 'status', 'acara_id'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
}

