@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>
    <form action="{{ route('kategoris.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" required>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection