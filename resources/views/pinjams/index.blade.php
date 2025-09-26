@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pinjam</h2>
    <a href="{{ route('pinjams.create') }}" class="btn btn-primary mb-3">Tambah Pinjam</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Kembali</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pinjams as $pinjam)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pinjam->tanggal_pinjam }}</td>
                <td>{{ $pinjam->nama_peminjam }}</td>
                <td>{{ $pinjam->judul_buku }}</td>
                <td>{{ $pinjam->tanggal_kembali }}</td>
                <td>{{ $pinjam->petugas }}</td>
                <td>
                    <a href="{{ route('pinjams.show', $pinjam->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('pinjams.edit', $pinjam->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pinjams.destroy', $pinjam->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $pinjams->links() !!}
</div>
@endsection