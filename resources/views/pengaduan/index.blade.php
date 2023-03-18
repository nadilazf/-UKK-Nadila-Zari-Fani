@extends('layouts.master')
@section('header', 'DAFTAR PENGADUAN')
@section('content', )
<div class="container">
    <div class="button my-4">
        <a type="button" class="btn btn-success" href="{{ route('pengaduan.create') }}">Create</a>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Pengaduan</th>
                <th scope="col">Isi Laporan</th>
                <th scope="col">tanggapan</th>
                <th>Status</th>
                <th scope="col">Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduans as $pengaduan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                <td>{{ $pengaduan->isi_laporan }}</td>
                <td>
                    @if ($pengaduan->getDataTanggapan == null)
                        -
                    @else
                        {{ $pengaduan->getDataTanggapan->tanggapan }}
                    @endif
                </td>
                <td>
                    @if ($pengaduan->status == '0')
                        menunggu respon
                    @else
                        {{ $pengaduan->status }}
                    @endif
                </td>
                <td><img src="{{ asset($pengaduan->foto) }}" alt="" width="100px"></td>
                <td>
                    <form action="/pengaduan/destroy/{{ ($pengaduan->id) }}" method="POST">

                        <a class="btn btn-primary" href="/pengaduan/edit/{{ $pengaduan->id }}" method="POST">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pengaduans->links() }}
</div>
@endsection
