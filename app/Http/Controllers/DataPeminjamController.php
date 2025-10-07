<?php
namespace App\Http\Controllers;

use App\Models\DataPeminjam;
use Illuminate\Http\Request;

class DataPeminjamController extends Controller
{
    public function index()
    {
        $data_peminjams = DataPeminjam::paginate(10);
        return view('data_peminjams.index', compact('data_peminjams'));
    }


    public function create()
    {
        return view('data_peminjams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        DataPeminjam::create($validated);
        return redirect()->route('data_peminjams.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(DataPeminjam $data_peminjam)
    {
        return view('data_peminjams.show', compact('data_peminjam'));
    }

    public function edit(DataPeminjam $data_peminjam)
    {
        return view('data_peminjams.edit', compact('data_peminjam'));
    }

    public function update(Request $request, DataPeminjam $data_peminjam)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        $data_peminjam->update($validated);
        return redirect()->route('data_peminjams.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(DataPeminjam $data_peminjam)
    {
        $data_peminjam->delete();
        return redirect()->route('data_peminjams.index')->with('success', 'Data berhasil dihapus!');
    }
}