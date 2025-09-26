@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori</h2>
    <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori', $kategori->kategori) }}">
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection