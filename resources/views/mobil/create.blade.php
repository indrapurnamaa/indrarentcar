@extends('template')
@section('title', 'Indra RentCar - Tambah Mobil')
@section('content')
    <div class="container">
        <div class="mt-4">
            <h3>Tambah Mobil</h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('mobil.store') }}" method="POST">

                            @csrf

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Merek</label>
                                <input type="text" class="form-control @error('merek') is-invalid @enderror"
                                    name="merek" value="{{ old('merek') }}" placeholder="Masukkan Merek">

                                <!-- error message untuk title -->
                                @error('merek')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Model</label>
                                <input type="model" class="form-control @error('model') is-invalid @enderror"
                                    name="model" value="{{ old('passaword') }}" placeholder="Masukkan Model">

                                <!-- error message untuk title -->
                                @error('model')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">No. Plat</label>
                                <input type="text" class="form-control @error('no_plat') is-invalid @enderror"
                                    name="no_plat" value="{{ old('no_plat') }}" placeholder="Masukkan No. Plat">

                                <!-- error message untuk title -->
                                @error('no_plat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Tarif</label>
                                <input type="text" class="form-control @error('tarif') is-invalid @enderror"
                                    name="tarif" value="{{ old('tarif') }}" placeholder="Masukkan Tarif Perhari">

                                <!-- error message untuk title -->
                                @error('tarif')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-2">
                                <label class="font-weight-bold" for="ketersediaan">Ketersediaan</label>
                                    <select name="ketersediaan" class="form-select">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>

                                <!-- error message untuk title -->
                                @error('ketersediaan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <div>
                                <div class="row gap-2 gap-md-0">
                                    <div class="d-grid col-md-6">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <div class="d-grid col-md-6">
                                        <a href="{{ route('mobil.index') }}" class="btn btn-secondary">Kembali</a>
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
