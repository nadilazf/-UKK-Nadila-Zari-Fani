@extends('layouts.master')
@section('header', 'DAFTAR PETUGAS')
@section('content')
    <div class="">
        <div class="button my-4">
            <a type="button" class="btn btn-success" href="{{ route('petugas.create') }}">Create</a>
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
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Username</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Petugas as $petugas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $petugas->nama }}</td>
                    <td>{{ $petugas->username }}</td>
                    <td>{{ $petugas->telp }}</td>
                    <td>{{ $petugas->level }}</td>
                    <td>
                        <form action="/petugas/destroy/{{ ($petugas->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('petugas.edit', $petugas->id) }}" method="POST">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $Petugas->links() }}
    </div>
@endsection
