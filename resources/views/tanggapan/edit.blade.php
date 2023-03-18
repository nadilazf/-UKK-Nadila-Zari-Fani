@extends('layouts.master')
@section('header' ,'EDIT TANGGAPAN')
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
    <a href="{{ route('tanggapan.index') }}" class="btn btn-success">Kembali</a>
      <br>
      <br>
    <div class="row col-md-15">
        <div class="card p-5">
            <form action="{{ route('tanggapan.update', ['id_tanggapan' => $tanggapan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
    @method('POST')
    <div class="mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Tanggal :</strong>
            <input type="date" name="tgl_tanggapan" value="{{ $tanggapan->tgl_tanggapan }}" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Tanggapan :</strong>
              <textarea name="tanggapan" class="form-control" cols="30" rows="4">{{ $tanggapan->tanggapan }}</textarea>
            </div>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Status :</strong>
            <div class="d-flex">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="status1" value="proses" @if($pengaduan->status == "proses") checked @endif>
                  <label class="form-check-label" for="status1">
                    Proses
                  </label>
                </div>
                <div class="form-check ms-5">
                  <input class="form-check-input" type="radio" name="status" id="status2" value="selesai" @if($pengaduan->status == "selesai") checked @endif>
                  <label class="form-check-label" for="status2">
                    Selesai
                  </label>
                </div>
              </div>
          </div>
        </div>
        <input type="hidden" name="id_petugas" class="form-control" value="{{ Auth::guard('petugas')->user()->id }}">
        <input type="hidden" name="id_pengaduan" class="form-control" value="{{ $pengaduan->id }}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>
</div>
</div>
</div>
  @endsection
