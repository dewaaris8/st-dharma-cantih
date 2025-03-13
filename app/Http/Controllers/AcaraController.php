<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraController extends Controller {
    public function index() {
        $acara = Acara::all();
        return view('acara.index', compact('acara'));
    }


    public function create() {
        return view('acara.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        Acara::create($request->all());

        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil ditambahkan');
    }

    public function edit(Acara $acara) {
        return view('acara.edit', compact('acara'));
    }

    public function show(Acara $acara)
    {
        return view('acara.show', compact('acara'));
    }

    public function update(Request $request, Acara $acara) {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $acara->update($request->all());

        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil diperbarui');
    }

    public function destroy(Acara $acara) {
        $acara->delete();
        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil dihapus');
    }
}

