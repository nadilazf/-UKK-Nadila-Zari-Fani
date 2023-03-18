@extends('layouts.master')
@section('header', 'DAFTAR MASYARAKAT')
@section('content')
    <div class="">

        {{-- <div class="button my-4">
            <a type="button" class="btn btn-success" href="{{ route('petugas.create') }}">Create</a>
        </div> --}}
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
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">NIK</th>
                    <th scope="col">No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masyarakats as $masyarakat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $masyarakat->nama }}</td>
                    <td>{{ $masyarakat->username }}</td>
                    <td>{{ $masyarakat->nik }}</td>
                    <td>{{ $masyarakat->telp }}</td>
                    <td>
                        <form action="/petugas/masyarakat/destroy/{{ ($masyarakat->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $masyarakats->links() }}
    </div>
@endsection
