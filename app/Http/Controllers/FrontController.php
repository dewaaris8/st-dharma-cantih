<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\InventarisBarang;
use App\Models\Pengumuman;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $pengumuman = Pengumuman::orderByDesc('id')->get();
        $inventarisBarangs = InventarisBarang::orderByDesc('id')->get();

        return view('front.index', compact('pengumuman', 'inventarisBarangs'));
    }

    public function absensi(){
        $daerahs = ['Delod', 'Kaja Kangin', 'Kaja Kauh'];
    $dataAbsensi = [];

    foreach ($daerahs as $daerah) {
        $anggota = \App\Models\Anggota::where('daerah', $daerah)
            ->with(['absensi' => function ($query) {
                $query->select('anggota_id')
                    ->selectRaw("SUM(CASE WHEN status = 'hadir' THEN 1 ELSE 0 END) as total_hadir")
                    ->selectRaw("SUM(CASE WHEN status = 'tidak hadir' THEN 1 ELSE 0 END) as total_tidak_hadir")
                    ->selectRaw("SUM(CASE WHEN status = 'sakit' THEN 1 ELSE 0 END) as total_sakit")
                    ->groupBy('anggota_id');
            }])
            ->get();

        $dataAbsensi[$daerah] = $anggota;
    }

    $inventarisBarangs = InventarisBarang::orderByDesc('id')->get();

    return view('front.absensi', compact('dataAbsensi', 'inventarisBarangs'));
    }

    public function barang(){
        $pengumuman = Pengumuman::orderByDesc('id')->get();
        $inventarisBarangs = InventarisBarang::orderByDesc('id')->get();

        return view('front.barang', compact('pengumuman', 'inventarisBarangs'));
    }

    public function cetakPdf($daerah)
    {
        $anggotaList = Anggota::where('daerah', $daerah)
            ->with(['absensi' => function ($query) {
                $query->select('anggota_id')
                    ->selectRaw("SUM(CASE WHEN status = 'hadir' THEN 1 ELSE 0 END) as total_hadir")
                    ->selectRaw("SUM(CASE WHEN status = 'tidak hadir' THEN 1 ELSE 0 END) as total_tidak_hadir")
                    ->selectRaw("SUM(CASE WHEN status = 'sakit' THEN 1 ELSE 0 END) as total_sakit")
                    ->groupBy('anggota_id');
            }])
            ->get();

        $pdf = FacadePdf::loadView('pdf.absensi', compact('anggotaList', 'daerah'));
        return $pdf->download("absensi_{$daerah}.pdf");
    }
}
