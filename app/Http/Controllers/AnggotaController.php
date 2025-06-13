<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AnggotaController extends Controller
{
   

public function index(Request $request)
{
    $search = $request->input('search');

    // Ambil semua data yang cocok
    $query = Anggota::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%")
              ->orWhere('daerah', 'LIKE', "%$search%");
        });
    }

    $query->orderBy('daerah')->orderBy('nama');

    $allAnggota = $query->get();

    // Kelompokkan berdasarkan daerah
    $grouped = $allAnggota->groupBy('daerah');

    // Flatten hasil agar bisa dipaginasi
    $flattened = $grouped->flatten(1);

    // Manual pagination
    $perPage = 10;
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $currentItems = $flattened->slice(($currentPage - 1) * $perPage, $perPage)->values();

    $paginated = new LengthAwarePaginator(
        $currentItems,
        $flattened->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    // Group ulang item yang sudah dipaginasi
    $groupedPaginated = $currentItems->groupBy('daerah');

    return view('anggota.index', [
        'groupedAnggota' => $groupedPaginated,
        'anggota' => $paginated,
    ]);
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
        'status' => 'required|in:Aktif,Tidak Aktif',
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
            'telepon' => 'required',
            'nama_ibu' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Tidak Aktif',
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

