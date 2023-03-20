@extends('layouts.master')
@section('header', 'TAMBAH PENGADUAN')
@section('content')
  @if ($errors->any())
    <div class="alert alert-danger mt-4">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container">
    <a href="{{ route('pengaduan.index') }}" class="btn btn-success">Kembali</a>
     <br>
     <br>
    <div class="row col-md-15">
        <div class="card p-5">
            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mt-2">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Tanggal :</strong>
            <input type="date" name="tgl_pengaduan" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Isi Laporan :</strong>
            <textarea name="isi_laporan" class="form-control" cols="30" rows="4"></textarea>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
          <strong>Foto :</strong>
          <div class="input-group mb-3">
            <input type="file" name="foto" class="form-control" id="inputGroupFile02">
            <input type="hidden" name="nik" class="form-control" value="{{ Auth::guard('masyarakat')->user()->nik }}">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Akses :</strong>
                <select class="form-select" aria-label="Default select example" name="akses">
                    <option value= "publik">Publik</option>
                    <option value="privat">Privat</option>
                    </select>
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>
 </div>
</div>
</div>
 @endsection
