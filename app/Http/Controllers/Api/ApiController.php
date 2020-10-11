<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kecamatan;
use Auth;

class ApiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:petugas-api')->except(['login']);
    // }

    public function index()
    {
        $anggotas = Anggota::with('kecamatan')->get();

        return response()->json($anggotas);
    }

    public function show($id)
    {
        $anggota = Anggota::with('kecamatan')->findOrFail($id);

        return response()->json($anggota);
    }

    public function searchByNama(Request $request)
    {
        $anggotas = Anggota::where('nama', 'like','%'.$request->nama.'%')->get();

        return response()->json($anggotas);
    }

    public function searchByKecamatan(Request $request)
    {
        $anggotas = Anggota::where('kecamatan_id', $request->kecamatan_id)->get();

        return response()->json($anggotas);
    }

    public function kecamatan()
    {
        $kecamatans = Kecamatan::all();

        return response()->json($kecamatans);
    }

}