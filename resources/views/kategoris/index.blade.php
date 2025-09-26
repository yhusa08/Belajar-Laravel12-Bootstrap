@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kategori') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- first button --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Kategori o tsuika
                        </button>
                    </div>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kategori o tsuika</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('kategoris.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="InputKategori" class="form-label"><strong>Kategori</strong></label>
                                        <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="InputKategori" value="{{ old('kategori') }}">
                                        @error('kategori')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chikai</button>
                                        <button type="submit" class="btn btn-primary">Hozon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- ini halaman create --}}

                    <table class="table table-border table-striped mt4">
                        <thead>
                            <tr>
                                <th width="80px">NO</th>
                                <th>Kategori</th>
                                <th width="250px">Akushon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $kategori)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $kategori->kategori }}</td>
                                    <td>
                                        <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST">
                                            <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Henshū</a>
                                            <a href="{{ route('kategoris.show', $kategori->id) }}" class="btn btn-info btn-sm">Shō</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Shōkyo</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Dēta ga arimasen</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {!! $kategoris->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection