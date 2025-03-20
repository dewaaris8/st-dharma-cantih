<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function cetakPdf()
    {
        $dataAnggota = Anggota::all();
        $pdf = FacadePdf::loadView('pdf.anggota', compact('dataAnggota'));
        return $pdf->download('data_anggota.pdf');
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:anggotas,email',
        'telepon' => 'required|numeric|digits_between:10,15',
        'alamat' => 'required|string|max:255',
        'nama_ibu' => 'required|string|max:255',
        'nama_ayah' => 'required|string|max:255',
        'daerah' => 'required|string|in:Kaja Kauh,Kaja Kangin,Delod',
    ]);

    Anggota::create($request->all());

    return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
}


    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:anggotas,email,' . $anggota->id,
            'telepon' => 'required'
        ]);

        $anggota->update($request->all());

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}

