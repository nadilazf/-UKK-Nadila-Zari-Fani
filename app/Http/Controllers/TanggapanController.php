<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index()
    {
        $tanggapans = Tanggapan::latest()->with('getDataPetugas', 'getDataPengaduan')->paginate(5);
        return view('tanggapan.index', compact('tanggapans'));
    }

    public function create($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        if($pengaduan->status == 'selesai'){
            return back()->with('error', 'Status pengaduan sudah selesai');
        }
        return view('tanggapan.create', compact('pengaduan'));
    }

    public function store(Request $request, $id_pengaduan)
    {
        $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        $updateStatus = Pengaduan::findOrFail($id_pengaduan);
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = new Tanggapan;
        $data->id_pengaduan = $id_pengaduan;
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->save();

        return redirect()->route('tanggapan.index')->with('success', 'Berhasil menanggapi');
    }

    public function edit($id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $pengaduan = Pengaduan::findOrFail($tanggapan->id_pengaduan);

        return view('tanggapan.edit', compact('tanggapan', 'pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        $updateStatus = Pengaduan::findOrFail($request->id_pengaduan);
        $updateStatus->status = $request->status;
        $updateStatus->update();

        $data = Tanggapan::findOrFail($id);
        $data->tgl_tanggapan = $request->tgl_tanggapan;
        $data->tanggapan = $request->tanggapan;
        $data->id_petugas = $request->id_petugas;
        $data->update();

        return redirect()->route('tanggapan.index')->with('success', 'Berhasil mengubah tanggapan');
    }

    public function destroy($id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapanIdentik = Tanggapan::findOrFail($tanggapan->id_pengaduan);
        $pengaduan = Pengaduan::findOrFail($tanggapan->id_pengaduan);

        if($tanggapan && $pengaduan) {
            $tanggapan->delete();
            $tanggapanIdentik->delete();
            $pengaduan->delete();

            return redirect()->route('tanggapan.index')->with('success', 'Berhasil menghapus tanggapan');
        }
        return back()->with('error', 'Gagal menghapus tanggapan');
    }

    public function generatePDF()
    {
        $admin = Auth::guard('petugas')->user()->nama;
        $tanggapans = Tanggapan::latest()->with('getDataPetugas', 'getDataPengaduan')->get();

        $data = [
         'judul' => 'Generate Tanggapan dan Pengaduan',
         'admin' => $admin,
         'tanggapans' => $tanggapans
        ];

        $pdf = Pdf::loadView('tanggapan.generate_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
