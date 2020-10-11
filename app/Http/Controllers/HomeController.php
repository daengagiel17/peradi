<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kecamatan;

class HomeController extends Controller
{
    public function home()
    {
        $kecamatans = Kecamatan::all();
        $anggotas = Anggota::all();

        return view('home', compact(['anggotas', 'kecamatans']));
    }

    public function index()
    {
        $status = "Semua data";
        $anggotas = Anggota::all();
        $kecamatans = Kecamatan::all();

        return view('search', compact(['anggotas', 'status', 'kecamatans']));
    }

    public function show($id)
    {
        $kecamatans = Kecamatan::all();
        $anggota = Anggota::findOrFail($id);

        return view('show', compact(['anggota', 'kecamatans']));
    }

    public function searchByNama(Request $request)
    {
        $status = 'Hasil pencarian "'.$request->nama.'" ';
        $anggotas = Anggota::where('nama', 'like','%'.$request->nama.'%')->get();

        $kecamatans = Kecamatan::all();

        return view('search', compact(['anggotas', 'status', 'kecamatans']));
    }

    public function searchByKecamatan(Request $request)
    {
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $status = 'Hasil pencarian Kecamatan '.$kecamatan->nama;
        $anggotas = Anggota::where('kecamatan_id', $request->kecamatan_id)->get();

        $kecamatans = Kecamatan::all();

        return view('search', compact(['anggotas', 'status', 'kecamatans']));
    }

    public function privacy()
    {
        return view('privacy');
    }

}
