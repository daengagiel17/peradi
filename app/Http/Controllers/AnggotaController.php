<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kecamatan;
use App\Imports\AnggotaImport;
use Maatwebsite\Excel\Facades\Excel;
use File;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anggotas = Anggota::all()->sortByDesc('id');
        return view('anggota.index', compact(['anggotas']));
    }

    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);

        return view('anggota.show', compact(['anggota']));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('anggota.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $anggota = Anggota::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nia' => $request->nia,
            'alamat_kantor' => $request->alamat_kantor,
            'kecamatan_id' => $request->kecamatan_id,
            'email' => $request->email,
        ]);

        if ($request->hasFile('photo')) {
            $dir = 'img/anggota/';
            if (($anggota->photo != '') && ($anggota->photo != 'img/advokat.jpg') && (File::exists($anggota->photo))){
                File::delete($anggota->photo);
            }
            $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('photo')->move($dir, $fileName);
            $anggota->photo = $dir . $fileName;
        }
        $anggota->save();

        return redirect()->route('anggota.index');
    }

    public function edit($id)
    {
        $kecamatans = Kecamatan::all();
        $anggota = Anggota::findOrFail($id);

        return view('anggota.edit', compact('anggota', 'kecamatans'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::where('id', $id)->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nia' => $request->nia,
            'alamat_kantor' => $request->alamat_kantor,
            'kecamatan_id' => $request->kecamatan_id,
            'status' => $request->status,
            'email' => $request->email,
        ]);

        $anggota = Anggota::find($id);
        if ($request->hasFile('photo')) {
            $dir = 'img/anggota/';
            if (($anggota->photo != '') && ($anggota->photo != 'img/advokat.jpg') && (File::exists($anggota->photo))){
                File::delete($anggota->photo);
            }
            $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('photo')->move($dir, $fileName);
            $anggota->photo = $dir . $fileName;
        }
        $anggota->save();

        return redirect()->route('anggota.index');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        if (($anggota->photo != 'img/advokat.jpg') && (File::exists($anggota->photo))){
            File::delete($anggota->photo);
        }        
        $anggota->delete();

        return response()->json($anggota);
    }

    public function uploadAnggota()
    {
        return view('dashboard.upload-anggota');
    }

    public function imporAnggota()
    {
        Excel::import(new AnggotaImport,request()->file('file'));
        return back();
    }

}
