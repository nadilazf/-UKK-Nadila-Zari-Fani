<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;
use App\Models\Pengaduan;


class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapans';
    protected $fillable = ['id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'];

    public function getDataPetugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id');
    }

    public function getDataPengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id');
    }

    public function getDataMasyarakat()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id')->with('getDataMasyarakat');
    }
}
