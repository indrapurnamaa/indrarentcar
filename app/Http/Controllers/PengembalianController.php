<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index()
    {
          // Menggunakan guard 'pengguna'
          $loggedInUserId = Auth::guard('pengguna')->user()->id;

          // Mengambil peminjaman berdasarkan pengguna yang login
          $userPinjam = Pengembalian::where('pengguna_id', $loggedInUserId)->get();
  
          $pengembalians = Pengembalian::latest()->paginate(5);
  
          $users = User::all();

        return view('pengembalian.index' , compact('userPinjam','pengembalians','users'));
    }
}
