@extends('template')
@section('title', 'Indra RentCar - Pinjam Mobil')
@section('content')
    <div class="container">
        <div class="mt-4">
            <h3>Pinjam Mobil</h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('peminjaman.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-2">
                                <label class="font-weight-bold" for="mobil_id">Mobil</label>
                                <select name="mobil_id" id="mobil_id" class="form-select">
                                    @foreach ($mobils as $mobil)
                                        <option value="{{ $mobil->id }}">{{ $mobil->model }}</option>
                                    @endforeach
                                </select>
                            </div>

                          
                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Tanggal Mulai Sewa</label>
                                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror"
                                    name="tgl_mulai" value="{{ old('tgl_mulai') }}">

                                <!-- error message untuk title -->
                                @error('tgl_mulai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Tanggal Selesai Sewa</label>
                                <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror"
                                    name="tgl_selesai" value="{{ old('tgl_selesai') }}">

                                <!-- error message untuk title -->
                                @error('tgl_selesai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <div>
                                <div class="row gap-2 gap-md-0">
                                    <div class="d-grid col-md-6">
                                        <button type="submit" class="btn btn-primary">Pinjam</button>
                                    </div>
                                    <div class="d-grid col-md-6">
                                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
