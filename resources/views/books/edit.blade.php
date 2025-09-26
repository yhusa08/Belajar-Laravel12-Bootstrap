@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control" value="{{ $book->judul_buku }}" required>
        </div>
        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="pengarang" class="form-control" value="{{ $book->pengarang }}" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" value="{{ $book->penerbit }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $book->kategori }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection