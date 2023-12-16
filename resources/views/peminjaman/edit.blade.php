@extends('template')
@section('title', 'Indra RentCar - Edit Pinjaman')
@section('content')
    <div class="container">
        <div class="mt-4">
            <h3>Edit Pinjaman Mobil</h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror"
                                    name="tgl_mulai" value="{{ old('tgl_mulai', $peminjaman->tgl_mulai) }}">

                                <!-- error message untuk title -->
                                @error('tgl_mulai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Selesai</label>
                                <input type="text" class="form-control @error('tgl_selesai') is-invalid @enderror"
                                    name="tgl_selesai" value="{{ old('tgl_selesai', $peminjaman->tgl_selesai) }}">

                                <!-- error message untuk title -->
                                @error('tgl_selesai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
