@extends('template')
@section('title', 'Indra RentCar - Detail Pinjaman')
@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <h4>Detail Pinjaman</h4>
                        </div>
                        <hr>
                        <div class="d-grid">
                            <div class="mb-2">ID</div>
                            <h6>{{ $peminjaman->id }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Tanggal Mulai</div>
                            <h6>{{ date('d-m-Y',strtotime($peminjaman->tgl_mulai)) }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Tanggal Selesai</div>
                            <h6>{{ date('d-m-Y',strtotime($peminjaman->tgl_selesai)) }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Merek</div>
                            <h6>{{ $peminjaman->mobil->merek }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Model</div>
                            <h6>{{ $peminjaman->mobil->model }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">No. Plat</div>
                            <h6>{{ $peminjaman->mobil->no_plat }}</h6>
                        </div>
                        <div class="d-grid">
                            <div class="mb-2">Tarif</div>
                            <h6> Rp.{{ number_format($peminjaman->mobil->tarif, 0, ',', '.') }} / Hari </h6>
                        </div>
                        <hr>
                        <div>
                            <a href="{{ route('peminjaman.index') }}"
                                class="btn btn-secondary d-flex justify-content-center">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
