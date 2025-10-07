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
        <div class="form-group">
            <label for="nama_peminjam">Nama Peminjam</label>
            <select class="form-control" id="nama_peminjam" name="peminjam_id">
                <option value="">-- Pilih Peminjam --</option>
                
                @foreach ($peminjams as $peminjam)
                    <option value="{{ $peminjam->id }}">
                        {{ $peminjam->nama_peminjam }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <select class="form-control" id="judul_buku" name="buku_id">
                <option value="">-- Pilih Buku --</option>
                
                @foreach ($books as $buku)
                    <option value="{{ $buku->id }}">
                        {{ $buku->judul_buku }} </option>
                @endforeach
            </select>
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