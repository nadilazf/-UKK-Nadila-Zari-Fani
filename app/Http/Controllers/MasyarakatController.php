<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::latest()->paginate(5);
        return view('masyarakat.index', compact('masyarakats'));
    }

    public function destroy($id)
    {
        if(Auth::guard('petugas')->user()->level == 'petugas') {
            return back()->with('error', 'kamu engga punya akses');
        }
        $masyarakat = Masyarakat::findOrFail($id);
        $pengaduans = Pengaduan::where('nik', $masyarakat->nik)->get();
        foreach ($pengaduans as $pengaduan){
            $tanggapans = Tanggapan::where('id_pengaduan', $pengaduan->id)->get();
            foreach ($tanggapans as $tanggapan){
                $tanggapan->delete();
            }
            $pengaduan->delete();
        }
        $masyarakat->delete();

        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat sudah terhapus');
    }
}
