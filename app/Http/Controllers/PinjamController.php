<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;
use App\Models\DataPeminjam;
use App\Models\Book;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $pinjams = \App\Models\Pinjam::latest()->paginate(10);
    $i = ($pinjams->currentPage() - 1) * $pinjams->perPage();
    return view('pinjams.index', compact('pinjams', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    // 1. Ambil semua data peminjam
    $peminjams = DataPeminjam::all(); 

    // 2. Ambil semua data buku
    $books = Book::all(); 

    // 3. Kirim kedua data ke view
    return view('pinjams.create', compact('peminjams', 'books'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
 {
    $validated = $request->validate([
        'tanggal_pinjam'   => 'required|date',
        'nama_peminjam'    => 'required|string|max:255',
        'judul_buku'       => 'required|string|max:255',
        'tanggal_kembali'  => 'required|date',
        'petugas'          => 'required|string|max:255',
    ]);
    Pinjam::create($validated);
    return redirect()->route('pinjams.index')->with('success', 'Pinjam berhasil disimpan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        return view('pinjams.show', compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        return view('pinjams.edit', compact('pinjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
{
    $validated = $request->validate([
        'tanggal_pinjam'   => 'required|date',
        'nama_peminjam'    => 'required|string|max:255',
        'judul_buku'       => 'required|string|max:255',
        'tanggal_kembali'  => 'required|date',
        'petugas'          => 'required|string|max:255',
    ]);
    $pinjam->update($validated);
    return redirect()->route('pinjams.index')->with('success', 'Pinjam berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjams.index')->with('success', 'Pinjam berhasil dihapus!');
    }
}
