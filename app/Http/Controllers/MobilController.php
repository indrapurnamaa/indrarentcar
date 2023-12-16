<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->paginate(5);

        $users = User::all();

        return view('mobil.index',compact('mobils','users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $mobils = Mobil::where('merek', 'like', "%$query%")
                    ->orWhere('model', 'like', "%$query%")
                    ->orWhere('ketersediaan', 'like', "%$query%")
                    ->paginate(10);

        return view('mobil.index', compact('mobils'));
    }


    public function create(): View
    {
        return view('mobil.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'merek'     => 'required',
            'model'   => 'required',
            'no_plat'   => 'required',
            'tarif'   => 'required',
            'ketersediaan'   => 'required',
        ]);

        //create mobil
        Mobil::create([
            'merek'   => $request->merek,
            'model' => $request->model,
            'no_plat' => $request->no_plat,
            'tarif' => $request->tarif,
            'ketersediaan' => $request->ketersediaan,


        ]);

        //redirect to index
        return redirect()->route('mobil.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        return view('mobil.show', compact('mobil'));
    }

    public function edit(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        return view('mobil.edit', compact('mobil'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'merek'     => 'required',
            'model'   => 'required',
            'no_plat'   => 'required',
            'tarif'   => 'required',
            'ketersediaan'   => 'required',
        ]);

        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        // update mobil
        $mobil->update([
            'merek'   => $request->merek,
            'model' => $request->model,
            'no_plat' => $request->no_plat,
            'tarif' => $request->tarif,
            'ketersediaan' => $request->ketersediaan,
        ]);

        //redirect to index
        return redirect()->route('mobil.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        //delete mobil
        $mobil->delete();

        //redirect to index
        return redirect()->route('mobil.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}