@extends('template')
@section('title', 'Indra RentCar - Detail Mobil')
@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <h4>Detail Mobil</h4>
                        </div>
                        <hr>
                        <div class="d-grid">
                            <div class="mb-2">ID</div>
                            <h6>{{ $mobil->id }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Merek</div>
                            <h6>{{ $mobil->merek }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Model</div>
                            <h6>{{ $mobil->model }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">No.Plat</div>
                            <h6>{{ $mobil->no_plat }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Tarif</div>
                            <h6> Rp.{{ number_format($mobil->tarif, 0, ',', '.') }} / Hari </h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Ketersediaan</div>
                            <h6>{{ $mobil->ketersediaan }}</h6>
                        </div>
                        <hr>
                        <div>
                            <a href="{{ route('mobil.index') }}"
                                class="btn btn-secondary d-flex justify-content-center">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
