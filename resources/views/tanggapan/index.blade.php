@extends('layouts.master')
@section('header', 'DAFTAR TANGGAPAN')
@section('content')
    <div class="button my-4">
        {{-- <a type="button" class="btn btn-success" href="{{ route('tanggapan.create', $pengaduan->id) }}">Create</a> --}}
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="button my-4">
            <a type="button" class="btn btn-danger" href="{{ route('generate.pdf') }}">Generate PDF</a>
        </div>
        {{-- {{ dd(Auth::guard('petugas')->user()->level) }} --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id Pengaduan</th>
                <th scope="col">Tanggal Tanggapan</th>
                <th scope="col">Nama Petugas</th>
                <th scope="col">Tanggapan</th>
                <th scope="col">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanggapans as $tanggapan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tanggapan->id_pengaduan }}</td>
                <td>{{ $tanggapan->tgl_tanggapan }}</td>
                <td>{{ $tanggapan->getDataPetugas->nama }}</td>
                <td>{{ $tanggapan->tanggapan }}</td>
                <td>{{ $tanggapan->getDataPengaduan->status }}</td>
                <td>
                    <form action="/tanggapan/destroy/{{ ($tanggapan->id) }}" method="POST">

                        <a class="btn btn-primary" href="/tanggapan/edit/{{ $tanggapan->id }}" method="POST">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tanggapans->links() }}
@endsection
