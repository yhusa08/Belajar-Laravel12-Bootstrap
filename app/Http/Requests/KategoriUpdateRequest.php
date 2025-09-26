<?php
namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::latest()->paginate(10);
        $i = ($pinjams->currentPage() - 1) * $pinjams->perPage();
        return view('pinjams.index', compact('pinjams', 'i'));
    }

    public function create()
    {
        return view('pinjams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_pinjam' => 'required|date',
            'nama_peminjam' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'tanggal_kembali' => 'required|date',
            'petugas' => 'required|string|max:255',
        ]);
        Pinjam::create($validated);
        return redirect()->route('pinjams.index')->with('success', 'Data pinjam berhasil disimpan!');
    }

    public function show(Pinjam $pinjam)
    {
        return view('pinjams.show', compact('pinjam'));
    }

    public function edit(Pinjam $pinjam)
    {
        return view('pinjams.edit', compact('pinjam'));
    }

    public function update(Request $request, Pinjam $pinjam)
    {
        $validated = $request->validate([
            'tanggal_pinjam' => 'required|date',
            'nama_peminjam' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'tanggal_kembali' => 'required|date',
            'petugas' => 'required|string|max:255',
        ]);
        $pinjam->update($validated);
        return redirect()->route('pinjams.index')->with('success', 'Data pinjam berhasil diupdate!');
    }

    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjams.index')->with('success', 'Data pinjam berhasil dihapus!');
    }
}