<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function form()
    {
        if (!config('pendaftaran.is_open')) {
            return view('pendaftaran.closed');
        }

        return view('pendaftaran.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email',
            'telepon' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'daerah' => 'required|in:Kaja Kauh,Kaja Kangin,Delod',
        ]);

        $validated['status'] = 'Tidak Aktif';
        $validated['is_verified'] = false;

        Anggota::create($validated);

        return redirect()->route('pendaftaran.form')->with('success', 'Pendaftaran berhasil. Menunggu verifikasi admin.');
    }

    public function toggle()
    {
        $path = config_path('pendaftaran.php');
        $isOpen = config('pendaftaran.is_open');

        // Ubah file konfigurasi pendaftaran
        File::put($path, '<?php return [\'is_open\' => ' . ($isOpen ? 'false' : 'true') . '];');

        return redirect()->route('admin.anggota.index')->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
