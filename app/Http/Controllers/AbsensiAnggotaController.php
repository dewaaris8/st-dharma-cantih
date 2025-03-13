<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAnggota;
use App\Models\Acara;
use App\Models\Anggota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AbsensiAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Acara $acara)
    {
        $absensi = AbsensiAnggota::where('acara_id', $acara->id)
        ->with('anggota') // Pastikan data anggota dimuat
        ->get()
        ->groupBy(function ($item) {
            return $item->anggota->daerah; // Mengelompokkan berdasarkan daerah
        });
        return view('absensi.index', compact('absensi', 'acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Acara $acara)
    {
        // Ambil anggota yang belum memiliki absensi untuk acara ini
        $anggota = Anggota::whereDoesntHave('absensi', function ($query) use ($acara) {
            $query->where('acara_id', $acara->id);
        })->get();
        return view('absensi.create', compact('acara', 'anggota'));
    }

    /**
     * Menyimpan absensi ke database.
     */
    public function store(Request $request, Acara $acara)
    {
        $request->validate([
            'absensi' => 'required|array',
            'absensi.*.anggota_id' => 'required|exists:anggotas,id',
            'absensi.*.status' => 'required|in:Hadir,Tidak Hadir,Sakit'
        ]);

        foreach ($request->absensi as $data) {
            AbsensiAnggota::updateOrCreate(
                [
                    'acara_id' => $acara->id,
                    'anggota_id' => $data['anggota_id']
                ],
                [
                    'tanggal' => now(),
                    'status' => $data['status']
                ]
            );
        }

        return redirect()->route('admin.acara.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    /**
     * Form edit absensi.
     */
    public function edit(Acara $acara)
    {
        $absensi = AbsensiAnggota::where('acara_id', $acara->id)->get();
        return view('absensi.edit_all', compact('acara', 'absensi'));
    }
    
    public function update(Request $request, Acara $acara)
    {
        $request->validate([
            'absensi' => 'required|array',
            'absensi.*.id' => 'required|exists:absensi_anggotas,id',
            'absensi.*.status' => 'required|in:Hadir,Tidak Hadir,Sakit'
        ]);
    
        foreach ($request->absensi as $data) {
            AbsensiAnggota::where('id', $data['id'])->update([
                'status' => $data['status']
            ]);
        }
    
        return redirect()->route('admin.absensi.index', $acara->id)->with('success', 'Absensi berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiAnggota $absensi)
    {
        $absensi->delete();
        return redirect()->route('admin.absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }

    public function editSingle(AbsensiAnggota $absensi)
{
    return view('absensi.edit_single', compact('absensi'));
}

public function updateSingle(Request $request, AbsensiAnggota $absensi)
{
    $request->validate([
        'status' => 'required|in:Hadir,Tidak Hadir,Sakit'
    ]);

    $absensi->update([
        'status' => $request->status
    ]);

    return redirect()->route('admin.absensi.index', $absensi->acara_id)->with('success', 'Absensi berhasil diperbarui.');
}

public function cetakPDF($daerah)
    {
        $dataAbsensi = Anggota::with('absensi')
            ->where('daerah', $daerah)
            ->get();

        if ($dataAbsensi->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data untuk daerah ini.');
        }

        $pdf = PDF::loadView('absensi.pdf', compact('dataAbsensi', 'daerah'))
            ->setPaper('a4', 'landscape');

        return $pdf->download("laporan-absensi-$daerah.pdf");
    }
}
