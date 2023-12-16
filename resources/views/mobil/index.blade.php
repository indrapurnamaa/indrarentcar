@extends('template')
@section('title', 'Indra RentCar - Mobil')
@section('content')
    <div class="container mt-4">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="d-md-flex d-grid gap-2 align-items-center">
            <h3 class="mb-0 flex-grow-1">Mobil</h3>
            <form action="{{ route('mobil.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mobil..." name="query">
                </div>
                <div class="mt-2 d-grid d-block d-lg-none">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </div>
            </form>
            <div class="flex-shrink-0 d-md-flex d-grid gap-2">
                <a href="{{ route('mobil.create') }}" class="btn btn-md btn-primary">Tambah Mobil</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body table-responsive">
                        @if ($mobils->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Merek</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">No.Plat</th>
                                        <th scope="col">Tarif</th>
                                        <th scope="col">Ketersediaan</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                            </table>
                            {{ $mobils->links() }}
                            <p class="m-2 mt-3">Data Mobil tidak ditemukan.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Merek</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">No.Plat</th>
                                        <th scope="col">Tarif</th>
                                        <th scope="col">Ketersediaan</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mobils as $mobil)
                                        <tr>
                                            <td>{{ $mobil->id }}</td>
                                            <td>{{ $mobil->merek }}</td>
                                            <td>{{ $mobil->model }}</td>
                                            <td>{{ $mobil->no_plat }}</td>
                                            <td> Rp.{{ number_format($mobil->tarif, 0, ',', '.') }} / Hari </td>
                                            <td>{{ $mobil->ketersediaan }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('mobil.destroy', $mobil->id) }}" method="POST">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class='bx bx-dots-horizontal-rounded'></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('mobil.show', $mobil->id) }}"><i
                                                                    class="bx bx-show me-1"></i> Show</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('mobil.edit', $mobil->id) }}"><i
                                                                    class="bx bx-edit me-1"></i> Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item" type="submit"><i
                                                                    class="bx bx-trash me-1"></i> Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $mobils->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
