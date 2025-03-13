<?php

namespace App\Http\Controllers;

use App\Models\InventarisBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class InventarisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = InventarisBarang::all();
        return view('inventaris.index', compact('barang'));
    }

    public function cetakPdf()
{
    $dataInventaris = InventarisBarang::all();
    $pdf = FacadePdf::loadView('pdf.inventaris', compact('dataInventaris'));
    return $pdf->download('inventaris_barang.pdf');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'required|string|max:255'
        ]);

        InventarisBarang::create($request->all());
        return redirect()->route('admin.inventaris.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InventarisBarang $inventaris)
    {
        return view('inventaris.show', compact('inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventarisBarang $inventaris)
    {
        return view('inventaris.edit', compact('inventaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventarisBarang $inventaris)
{
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
        'catatan' => 'required|string|max:255'
    ]);

    $inventaris->update($request->all());
    return redirect()->route('admin.inventaris.index')->with('success', 'Barang berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventarisBarang $inventaris)
    {
        $inventaris->delete();
        return redirect()->route('admin.inventaris.index')->with('success', 'Barang berhasil dihapus.');
    }
}
