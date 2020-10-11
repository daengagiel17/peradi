<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\Kabupaten;
use Auth;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:super admin');
    }

    public function index()
    {
        $admins = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super admin');
        })->get();        

        return view('admin.index', compact(['admins']));
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);

        return view('admin.show', compact(['admin']));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name', ['super admin'])->get();
        $kabupatens = Kabupaten::all();

        return view('admin.create', compact(['roles', 'kabupatens']));
    }

    public function store(Request $request)
    {
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => substr($request->nomor_hp,0,1)== 0?'62'.substr($request->nomor_hp,1):'62'.$request->nomor_hp,
            'photo' => 'img/profile/default.png',
            'kabupaten_id' => $request->kabupaten_id
        ]);

        $admin->roles()->attach($request->role_id);

        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        $roles = Role::whereNotIn('name', ['super admin'])->get();

        return view('admin.edit', compact(['admin', 'roles']));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            $dir = 'img/profile/';
            if (($admin->photo != 'img/profile/default.png') && (File::exists($admin->photo))){
                File::delete($admin->photo);
            }
            $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('photo')->move($dir, $fileName);
            $admin->photo = $dir . $fileName;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->nomor_hp = substr($request->nomor_hp,0,1)== 0?'62'.substr($request->nomor_hp,1):'62'.$request->nomor_hp;
        $admin->save();

        $admin->roles()->sync($request->role);

        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        if($id == Auth::user()->id){
            return response()->json(['status'=>"304"]);
        }

        $admin = User::findOrFail($id);
        $admin->delete();

        return response()->json(['status'=>"200", 'id'=>$id]);
    }
}
