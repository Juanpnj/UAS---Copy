<?php

namespace App\Http\Controllers;

use App\Models\IndexPreferensi;
use App\Models\Kriteria;
use App\Models\Option;
use App\Models\OptionBobot;
use App\Models\Preferensi;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ResultController extends Controller
{
    //
    public function index()
    {
        $kriterias = Kriteria::all();
        $options = Option::all();
        $opbobots = OptionBobot::all();
        $prefs = Preferensi::all();
        $iprefs = IndexPreferensi::all();
        $results = Result::all();
        return view('results.index', compact('kriterias', 'options', 'opbobots', 'prefs', 'results', 'iprefs'));
    }
    public function create()
    {
        $opbobots = OptionBobot::all();
        $count = Kriteria::count();
        $options = Option::all();

        foreach ($opbobots as $a) {
            foreach ($opbobots as $b) {
                if ($a->idkrit == $b->idkrit && $a->idalt != $b->idalt) {

                    $bobotab = $a->bobot - $b->bobot;
                    if ($bobotab <= 0) {
                        $hdad = 0;
                    } elseif ($bobotab >= 1) {
                        $hdad = 1;
                    }
                    Preferensi::create([
                        'ida' => $a->idalt,
                        'idb' => $b->idalt,
                        'idkrit' => $a->idkrit,
                        'bobot' => $bobotab,
                        'hd' => $hdad
                    ]);
                }
            }
        }
        $prefs = Preferensi::all();
        foreach ($options as $a) {
            foreach ($options as $b) {
                if ($a != $b) {
                    $sum = Preferensi::where('ida', $a->id)->where('idb', $b->id)->sum('hd');
                    $ipref = (1 / ($count)) * $sum;
                    IndexPreferensi::updateOrCreate([
                        'ida' => $a->id,
                        'idb' => $b->id,
                        'ipref' => $ipref
                    ]);
                }
            }
        }


        return redirect()->route('result.index')->with('Sukses', 'Preferensi berhasil dibuat');
    }

    public function hapus()
    {
        Preferensi::query()->delete();
        Result::query()->delete();
        IndexPreferensi::query()->delete();

        return redirect()->route('result.index')->with('Sukses', 'Reset berhasil');
    }
    public function show($id)
    {
        // Contoh metode show sederhana

        return redirect()->route('result.index');
    }
    public function hitung()
    {
        $options = Option::all();
        // $prefs = Preferensi::all();
        $count = Kriteria::count();
        foreach ($options as $option) {
            $prefa = IndexPreferensi::where('ida', $option->id)->sum('ipref');

            $lflow = (1 / ($count - 1)) * $prefa;
            $prefb = IndexPreferensi::where('idb', $option->id)->sum('ipref');
            $eflow = (1 / ($count - 1)) * $prefb;
            $nflow = $lflow - $eflow;

            Result::create([
                'idalt' => $option->id,
                'alternatif' => $option->alternatif,
                'leavingflow' => $lflow,
                'enteringflow' => $eflow,
                'netflow' => $nflow
            ]);
        }
        $results = Result::orderBy('netflow', 'desc')->get();
        foreach ($results as $index => $result) {
            $result->update(['rank' => $index + 1]);
        }
        return redirect()->route('result.index')->with('Sukses', 'Hitung Berhasil');
    }
}
