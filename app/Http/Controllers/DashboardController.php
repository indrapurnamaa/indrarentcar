<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();

        $totalMobil = Mobil::count();

        $totalMobilTersedia = Mobil::where('ketersediaan', 'Tersedia')->count();

        $totalMobilTidakTersedia = Mobil::where('ketersediaan', 'Tidak Tersedia')->count();

        return view('dashboard.index', compact('totalUser','totalMobil' ,'totalMobilTersedia','totalMobilTidakTersedia'));
    }
}