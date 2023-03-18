<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $Petugas = Petugas::latest()->paginate(5);
        return view('petugas.index', compact('Petugas'));
    }

    public function create()
    {
        if(Auth::guard('petugas')->user()->level == 'petugas') {
            return back()->with('error', 'kamu engga punya akses');
        }
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        Petugas::create($validateData);
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dibuat');
    }

    public function edit(Request $request, $id)
    {
        if(Auth::guard('petugas')->user()->level == 'petugas') {
            return back()->with('error', 'kamu engga punya akses');
        }
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        $petugas = Petugas::findOrFail($id);
        $petugas->upadet();

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil di update');
    }

    public function destroy($id)
    {
        if (Auth::guard('petugas')->user()->level == 'petugas') {
            return back()->with('error', 'Anda tidak memiliki akses');
        }
        $petugas = Petugas::findOrFail($id);
        $tanggapans = Tanggapan::where('id_petugas', $petugas->id)->get();
            foreach ($tanggapans as $tanggapan){
                $tanggapan->delete();
            }
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Berhasil menghapus data');
    }
}
