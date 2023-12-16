<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Menggunakan guard 'pengguna'
        $loggedInUserId = Auth::guard('pengguna')->user()->id;

        // Mengambil peminjaman berdasarkan pengguna yang login
        $userPinjam = Peminjaman::where('pengguna_id', $loggedInUserId)->get();

        $peminjamans = Peminjaman::latest()->paginate(5);

        $users = User::all();

        return view('peminjaman.index', compact('peminjamans', 'users', 'userPinjam'));
    }

    public function create(): View
    {
        $mobils = Mobil::all();
        return view('peminjaman.create', compact('mobils'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'mobil_id' => 'required',
            'tgl_mulai'     => 'required',
            'tgl_selesai'     => 'required',
        ]);

        $mobil_id = $request->input('mobil_id');
        $tgl_mulai = $request->input('tgl_mulai');
        $tgl_selesai = $request->input('tgl_selesai');
        $peminjaman = new Peminjaman();
        $peminjaman->mobil_id = $mobil_id;
        $peminjaman->tgl_mulai = $tgl_mulai;
        $peminjaman->tgl_selesai = $tgl_selesai;
        $peminjaman->pengguna_id = Auth::guard('pengguna')->user()->id;
        $peminjaman->save();

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Peminjaman Berhasil!']);
    }

    public function show(string $id): View
    {
        //get peminjaman by ID
        $peminjaman = Peminjaman::findOrFail($id);

        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(string $id): View
    {
        //get peminjaman by ID
        $peminjaman = Peminjaman::findOrFail($id);

        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'tgl_mulai'     => 'required',
            'tgl_selesai'     => 'required',
        ]);

        //get peminjaman by ID
        $peminjaman = Peminjaman::findOrFail($id); {

            $peminjaman->update([
                'tgl_mulai'     => $request->tgl_mulai,
                'tgl_selesai'     => $request->tgl_selesai,
            ]);
        }

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get mobil by ID
        $peminjaman = Peminjaman::findOrFail($id);

        //delete post
        $peminjaman->delete();

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
