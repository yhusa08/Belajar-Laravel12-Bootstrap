@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="pengarang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection