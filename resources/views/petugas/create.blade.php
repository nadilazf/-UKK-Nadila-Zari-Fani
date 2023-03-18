@extends('layouts.master')
@section('header', 'TAMBAH DATA PETUGAS')
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
    <a href="{{ route('petugas.index') }}" class="btn btn-success">Kembali</a>
    <br>
    <br>
    <div class="col-md-12">
        <div class="card p-5">
            <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Nama :</strong>
                    <input type="text" name="nama" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Username :</strong>
                    <input type="text" name="username" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                    <div class="form-group">
                        <strong>No Telepon :</strong>
                        <input type="number" name="telp" class="form-control">
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                    <div class="form-group">
                        <strong>Password :</strong>
                        <input type="password" name="password" class="form-control">
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                    <div class="form-group">
                        <strong>Level:</strong>
                        <select class="form-select" aria-label="Default select example" name="level">
                            <option value= "petugas">Petugas</option>
                            <option value="admin">Admin</option>
                            </select>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
  </div>
@endsection

