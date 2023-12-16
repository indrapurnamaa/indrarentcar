@extends('template')
@section('title', 'Indra RentCar - Edit Mobil')
@section('content')
    <div class="container">
        <div class="mt-4">
            <h3>Edit Data Mobil</h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('mobil.update', $mobil->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Merek</label>
                                <input type="text" class="form-control @error('merek') is-invalid @enderror"
                                    name="merek" value="{{ old('merek', $mobil->merek) }}">

                                <!-- error message untuk title -->
                                @error('merek')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-bold">Model</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror"
                                    name="model" value="{{ old('model',$mobil->model) }}">

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
                                    name="no_plat" value="{{ old('no_plat', $mobil->no_plat) }}">

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
                                    name="tarif" value="{{ old('tarif', $mobil->tarif) }}">

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
                                        <option value="Tersedia" @if($mobil->ketersediaan == 'Tersedia') selected @endif>Tersedia</option>
                                        <option value="Tidak Tersedia" @if($mobil->ketersediaan == 'Tidak Tersedia') selected @endif>Tidak Tersedia</option>
                                    </select>
                                <!-- error message untuk title -->
                                @error('ketersediaan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('mobil.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
