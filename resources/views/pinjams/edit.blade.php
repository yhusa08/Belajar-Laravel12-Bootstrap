@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Pinjam</h2>
    <form action="{{ route('pinjams.update', $pinjam->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $pinjam->tanggal_pinjam }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" value="{{ $pinjam->nama_peminjam }}" required>
        </div>
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control" value="{{ $pinjam->judul_buku }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" value="{{ $pinjam->tanggal_kembali }}" required>
        </div>
        <div class="mb-3">
            <label>Petugas</label>
            <input type="text" name="petugas" class="form-control" value="{{ $pinjam->petugas }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pinjams.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection