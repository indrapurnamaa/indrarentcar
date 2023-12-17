@extends('template')
@section('title', 'Indra RentCar - Dashboard')
@section('content')
    <div class="container mt-4">
        <div class="fw-bold fs-4">
            Dashboard
        </div>
        <div class="row gap-lg-0 gap-2 mt-3">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="fw-bold fs-5">Total Semua Mobil</div>
                        <div class="fs-4">
                            {{ $totalMobil }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="fw-bold fs-5">Total Mobil Tersedia</div>
                        <div class="fs-4">
                            {{ $totalMobilTersedia }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="fw-bold fs-5">Total Mobil Tidak Tersedia</div>
                        <div class="fs-4">
                            {{ $totalMobilTidakTersedia }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
