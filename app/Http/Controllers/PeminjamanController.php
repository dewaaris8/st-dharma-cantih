<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\InventarisBarang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('inventaris')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $inventaris = InventarisBarang::all();
        return view('peminjaman.create', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required|exists:inventaris_barangs,id',
            'jumlah_dipinjam' => 'required|integer|min:1',
            'durasi_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'nama_peminjam' => 'required|string|max:255',
            'nomor_peminjam' => 'required|string|max:15',
        ]);

        // Ambil data barang dari inventaris
        $barang = InventarisBarang::findOrFail($request->inventaris_id);

        // Cek stok barang
        if ($barang->jumlah < $request->jumlah_dipinjam) {
            return back()->with('error', 'Stok tidak mencukupi!')->withInput();
        }

        // Kurangi stok barang
        $barang->jumlah -= $request->jumlah_dipinjam;
        $barang->save();

        // Hitung tanggal kembali otomatis
        $tanggal_kembali = date('Y-m-d', strtotime("+{$request->durasi_pinjam} days", strtotime($request->tanggal_pinjam)));

        // Simpan peminjaman
        Peminjaman::create([
            'inventaris_id' => $request->inventaris_id,
            'jumlah_dipinjam' => $request->jumlah_dipinjam,
            'durasi_pinjam' => $request->durasi_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => 'Belum dipinjam',
            'nama_peminjam' => $request->nama_peminjam,
            'nomor_peminjam' => $request->nomor_peminjam,
        ]);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }
    
    


    public function edit(Peminjaman $peminjaman)
    {
        $inventaris = InventarisBarang::all();
        return view('peminjaman.edit', compact('inventaris','peminjaman'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'inventaris_id' => 'required|exists:inventaris_barangs,id',
            'jumlah_dipinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'durasi_pinjam' => 'required|integer|min:1',
        ]);
    
        // Ambil data barang lama & baru dari inventaris
        $barangLama = InventarisBarang::findOrFail($peminjaman->inventaris_id);
        $barangBaru = InventarisBarang::findOrFail($request->inventaris_id);
    
        // Jika barang diubah, kembalikan stok barang lama
        if ($peminjaman->inventaris_id != $request->inventaris_id) {
            $barangLama->jumlah += $peminjaman->jumlah_dipinjam;
            $barangLama->save();
        }
    
        // Hitung selisih jumlah barang
        $selisih = $request->jumlah_dipinjam - $peminjaman->jumlah_dipinjam;
    
        // Jika stok tidak cukup, kembalikan dengan error
        if ($selisih > 0 && $barangBaru->jumlah < $selisih) {
            return back()->with('error', 'Stok tidak mencukupi!')->withInput();
        }
    
        // Update stok barang
        $barangBaru->jumlah -= $selisih;
        $barangBaru->save();
    
        // Hitung tanggal kembali otomatis
        $tanggalKembali = date('Y-m-d', strtotime("{$request->tanggal_pinjam} + {$request->durasi_pinjam} days"));
    
        // Update data peminjaman
        $peminjaman->update([
            'inventaris_id' => $request->inventaris_id,
            'jumlah_dipinjam' => $request->jumlah_dipinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'durasi_pinjam' => $request->durasi_pinjam,
            'tanggal_kembali' => $tanggalKembali,
        ]);
    
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }
    

    

    public function destroy(Peminjaman $peminjaman)
    {
        // Jika status "Dipinjam" atau "Belum Dipinjam", kembalikan stok barang
        if (in_array($peminjaman->status, ['Dipinjam', 'Belum Dipinjam'])) {
            $barang = InventarisBarang::findOrFail($peminjaman->inventaris_id);
            $barang->jumlah += $peminjaman->jumlah_dipinjam;
            $barang->save();
        }
    
        // Hapus data peminjaman
        $peminjaman->delete();
    
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus dan stok barang telah dikembalikan.');
    }
    

    public function updateStatus(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'status' => 'required|in:Dipinjam,Dikembalikan',
        ]);

        if ($request->status == 'Dikembalikan' && $peminjaman->status != 'Dikembalikan') {
            $barang = InventarisBarang::findOrFail($peminjaman->inventaris_id);
            $barang->jumlah += $peminjaman->jumlah_dipinjam;
            $barang->save();

            $peminjaman->update([
                'status' => 'Dikembalikan',
                'tanggal_kembali' => now(),
            ]);
        } else {
            $peminjaman->update([
                'status' => $request->status,
            ]);
        }

        return redirect()->route('admin.peminjaman.index')->with('success', 'Status peminjaman diperbarui.');
    }
    

}


