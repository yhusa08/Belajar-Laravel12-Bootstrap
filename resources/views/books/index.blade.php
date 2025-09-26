@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Buku</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $book->judul_buku }}</td>
                <td>{{ $book->pengarang }}</td>
                <td>{{ $book->penerbit }}</td>
                <td>{{ $book->kategori }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $books->links() !!}
</div>
@endsection