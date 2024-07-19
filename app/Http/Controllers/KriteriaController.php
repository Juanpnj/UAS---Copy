<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Option;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    //

    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriterias.index',compact('kriterias'));
    }
    public function create()
    {
        return view('kriterias.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:1',
            'kode' => 'required|min:1',
        ]);

        Kriteria::create([
            'namakrit' => $request->nama,
            'kodekrit' => $request->kode,
        ]);
        return redirect()->route('kriteria.index')->with('Sukses', 'Kriteria berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kriterias = Kriteria::find($id);
        return view('kriterias.edit', compact('kriterias'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $kriteria = Kriteria::find($id);
        $kriteria->update([
            'namakrit' => $request->nama
        ]);
        return redirect()->route('kriteria.index')->with('Sukses', 'Kriteria berhasil diubah');
    }
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('Sukses', 'Kriteria berhasil dihapus');
    }
    
}
