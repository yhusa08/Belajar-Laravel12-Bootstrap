{{-- filepath: resources/views/data_pepinjams/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Peminjam</h2>
    <a href="{{ route('data_pepinjams.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kelas</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_pepinjams as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->no_hp }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>
                    <a href="{{ route('data_pepinjams.show', $data->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('data_pepinjams.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('data_pepinjams.destroy', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data_pepinjams->links() !!}
</div>
@endsection