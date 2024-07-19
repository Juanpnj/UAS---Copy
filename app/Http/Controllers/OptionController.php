<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Option;
use App\Models\OptionBobot;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    //
    public function index(){
        $options = Option::all();
        $opbobots = OptionBobot::all();
        $kriterias = Kriteria::all();
        return view('options.index', compact('options', 'opbobots','kriterias'));
    }
    public function create()
    {
        $kriterias = Kriteria::all();
        return view('options.create', compact('kriterias'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:1',
        ]);
    
        $option = new Option();
        $option->alternatif = $request->nama;
        $option->save();


        $optionId = $option->id;
    

        $kriterias = Kriteria::all();
        foreach ($kriterias as $kriteria) {
            $request->validate([
                $kriteria->kodekrit => 'required|min:1',
            ]);
    
            OptionBobot::create([
                'idkrit' => $kriteria->id,
                'idalt' => $optionId,
                'bobot' => $request->{$kriteria->kodekrit},
            ]);
        }
        return redirect()->route('option.index')->with('Sukses', 'Alternatif berhasil dibuat');
    }

    public function edit($id)
    {
        $kriterias = Kriteria::all();
        $option = Option::find($id);
        $bobots = OptionBobot::where('idalt',$id)->get();
        return view('options.edit', compact('kriterias', 'option', 'bobots'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $option = Option::find($id);
        $option->update([
            'namakrit' => $request->nama
        ]);
        $kriterias = Kriteria::all();
        foreach ($kriterias as $kriteria){
            $bobot = OptionBobot::where('idalt', $id)->where('idkrit', $kriteria->id)->first();
            $request->validate([
                $kriteria->kodekrit => 'required'
            ]);
            $bobot->update([
                'bobot' => $request->{$kriteria->kodekrit}
            ]);
        }
        return redirect()->route('option.index')->with('Sukses', 'Alternatif berhasil diubah');
    }
    public function destroy($id)
    {
        $option = Option::find($id);
        OptionBobot::where('idalt', $id)->delete();
        $option->delete();
        return redirect()->route('option.index')->with('Sukses', 'Alternatif berhasil dihapus');
    }

}
