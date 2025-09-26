@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pinjam</h2>
    <table class="table">
        <tr>
            <th>Tanggal Pinjam</th>
            <td>{{ $pinjam->tanggal_pinjam }}</td>
        </tr>
        <tr>
            <th>Nama Peminjam</th>
            <td>{{ $pinjam->nama_peminjam }}</td>
        </tr>
        <tr>
            <th>Judul Buku</th>
            <td>{{ $pinjam->judul_buku }}</td>
        </tr>
        <tr>
            <th>Tanggal Kembali</th>
            <td>{{ $pinjam->tanggal_kembali }}</td>
        </tr>
        <tr>
            <th>Petugas</th>
            <td>{{ $pinjam->petugas }}</td>
        </tr>
    </table>
    <a href="{{ route('pinjams.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection