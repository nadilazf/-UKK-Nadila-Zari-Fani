<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Masyarakat;
use App\Models\Tanggapan;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    protected $fillable = ['tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];

    public function getDataMasyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }

    public function getDataTanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id', 'id_pengaduan');
    }
}
