@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Kategori</h2>
    <table class="table">
        <tr>
            <th>Kategori</th>
            <td>{{ $kategori->kategori }}</td>
        </tr>
    </table>

    <h4>Buku dalam kategori ini:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->judul_buku }}</td>
                <td>{{ $book->pengarang }}</td>
                <td>{{ $book->penerbit }}</td>
            </tr>
            @empty
            o
            <tr>
                <td colspan="4" class="text-center">Tidak ada buku pada kategori ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection