<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    // use HasFactory;

    // Nama tabel di database
    protected $table = 'pengumuman';

    // Primary Key (jika selain 'id', ubah sesuai dengan tabel)
    protected $primaryKey = 'id';

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'judul', 
        'deskripsi'
    ];
    
}
