<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        $i = ($kategoris->currentPage() - 1) * $kategoris->perPage();
        return view('kategoris.index', compact('kategoris', 'i'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);
        Kategori::create($validated);
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil disimpan!');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);
        $kategori->update($validated);
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function show(Kategori $kategori)
    {
        $books = $kategori->books;
        return view('kategoris.show', compact('kategori', 'books'));
    }
}