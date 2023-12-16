@extends('template')
@section('title', 'Indra RentCar - Peminjaman')
@section('content')
    <div class="container mt-4">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="d-md-flex d-grid gap-2 align-items-center">
            <h3 class="mb-0 flex-grow-1">Peminjaman Mobil</h3>
            <div class="flex-shrink-0 d-md-flex d-grid gap-2">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-md btn-primary">Pinjam Sekarang!</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body table-responsive">
                        @if ($peminjamans->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Merek</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                            </table>
                            {{ $peminjamans->links() }}
                            <p class="m-2 mt-3">Tidak ada peminjaman.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Merek</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userPinjam as $peminjaman)
                                        <tr>
                                            <td>{{ $peminjaman->id }}</td>
                                            <td>{{ date('d-m-Y',strtotime($peminjaman->tgl_mulai)) }}</td>
                                            <td>{{ date('d-m-Y',strtotime($peminjaman->tgl_selesai)) }}</td>
                                            <td>{{ $peminjaman->mobil->merek }}</td>
                                            <td>{{ $peminjaman->mobil->model }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class='bx bx-dots-horizontal-rounded'></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('peminjaman.show', $peminjaman->id) }}"><i
                                                                    class="bx bx-show me-1"></i> Show</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('peminjaman.edit', $peminjaman->id) }}"><i
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
                            {{ $peminjamans->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
