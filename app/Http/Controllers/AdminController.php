<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAnggota;
use App\Models\Acara;
use App\Models\Anggota;
use App\Models\InventarisBarang;
use App\Models\Peminjaman;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahAcara = Acara::count();
        $jumlahInventaris = InventarisBarang::count();
        $jumlahAbsensi = AbsensiAnggota::count();
        $jumlahAnggota = Anggota::count();
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahBelumDikembalikan = Peminjaman::where('status', 'belum dikembalikan')->count();
        $pengumuman = Pengumuman::all();
    
        return view('admin.index', compact(
            'jumlahInventaris',
            'jumlahAbsensi',
            'jumlahAnggota',
            'jumlahPeminjaman',
            'jumlahBelumDikembalikan',  
            'jumlahAcara',
            'pengumuman'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
