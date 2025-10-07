{{-- filepath: resources/views/data_pepinjams/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Data Peminjam</h2>
    <table class="table">
        <tr>
            <th>Nama Peminjam</th>
            <td>{{ $data_peminjam->nama_peminjam }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $data_peminjam->kelas }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $data_peminjam->no_hp }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $data_peminjam->jenis_kelamin }}</td>
        </tr>
    </table>
    <a href="{{ route('data_peminjams.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection