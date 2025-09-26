<?php
namespace App\Http\Controllers;

use App\Models\DataPepinjam;
use Illuminate\Http\Request;

class DataPepinjamController extends Controller
{
    public function index()
    {
        $data_pepinjams = DataPepinjam::latest()->paginate(10);
        $i = ($data_pepinjams->currentPage() - 1) * $data_pepinjams->perPage();
        return view('data_pepinjams.index', compact('data_pepinjams', 'i'));
    }

    public function create()
    {
        return view('data_pepinjams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        DataPepinjam::create($validated);
        return redirect()->route('data_pepinjams.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(DataPepinjam $data_pepinjam)
    {
        return view('data_pepinjams.show', compact('data_pepinjam'));
    }

    public function edit(DataPepinjam $data_pepinjam)
    {
        return view('data_pepinjams.edit', compact('data_pepinjam'));
    }

    public function update(Request $request, DataPepinjam $data_pepinjam)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        $data_pepinjam->update($validated);
        return redirect()->route('data_pepinjams.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(DataPepinjam $data_pepinjam)
    {
        $data_pepinjam->delete();
        return redirect()->route('data_pepinjams.index')->with('success', 'Data berhasil dihapus!');
    }
}