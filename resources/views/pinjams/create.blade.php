@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Data Pinjam</h2>
    <form action="{{ route('pinjams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Petugas</label>
            <input type="text" name="petugas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pinjams.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection