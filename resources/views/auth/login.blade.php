@extends('layouts.auth')
@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom position-absolute top-0 bottom-0">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="{{ asset('assets/registrasi.png') }}" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-4 col-lg-6 col-xl-4 offset-xl-1">
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
          @if (request()->is('login'))
          <form action="/login" method="POST">
            @csrf
            <div class="align-items-center text-center mb-0 me-3 my-2">
              <p style="font-size:20px"><strong>Aplikasi Pelaporan Pengaduan Masyarakat Desa Harjasari</strong></p>
            </div>
            <div class="align-items-center text-center">
                <p class="font-size:20px mb-0 me-3">login untuk melanjutkan</p>
            </div>
            <div class="divider d-flex align-items-center my-2">
            </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
                <div class="form-group">
                    <input type="text" name="username" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                      placeholder="Username"/>
                </div>
              </div>
               <!-- Password input -->
            <div class="form-outline mb-4">
                {{-- <label class="form-label" for="form3Example4">Password</label> --}}
                <input type="password" name="password" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                  placeholder="Password" />
              </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-success btn-lg w-100"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small mt-2 pt-1 mb-0">Belum Punya Akun? <a href="/register"
                  class="fw-bold link-danger">Daftar</a></p>
            </div>
          </form>
          @else
          <form action="/login/petugas" method="POST">
            @csrf
            <div class="align-items-center text-center">
              <p class="lead fw-normal mb-0 me-3"><strong>Hallo Petugas</strong></p>
            </div>
            <div class="align-items-center text-center">
                <p class="font-size:20px mb-0 me-3 my-2">login untuk melanjutkan</p>
            </div>
            <div class="divider d-flex align-items-center my-2">
            </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
                {{-- <label class="form-label" for="form3Example4">Username</label> --}}
                <input type="text" name="username" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                  placeholder="Username" />
              </div>
               <!-- Password input -->
            <div class="form-outline mb-4">
                {{-- <label class="form-label" for="form3Example4">Password</label> --}}
                <input type="password" name="password" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                  placeholder="Password" />
              </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-success btn-lg w-100"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>
          </form>
          @endif
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection
