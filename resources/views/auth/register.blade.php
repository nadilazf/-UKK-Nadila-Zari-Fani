@extends('layouts.auth')
@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom position-absolute top-0 bottom-0">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="assets/registrasi.png"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-4 col-lg-6 col-xl-4 offset-xl-1">
          <form action="/register" method="POST">
            @csrf
            <div class="align-items-center text-center">
              <p style="font-size:20px" class="mb-0 my-2"><strong>Aplikasi Pelaporan Pengaduan Masyarakat</strong></p>
            </div>
            <div class="align-items-center text-center">
                <p style="font-size:20px" class="mb-0 me-2"><strong>Desa Harjasari</strong></p>
              </div>
            <div class="align-items-center text-center">
                <p style="font-size:15px" class="mb-0 me-2 my-3">Buat akun untuk melanjutkan</p>
            </div>
            <div class="divider d-flex align-items-center my-2">
            </div>

            <!-- NIK input -->
                <div class="row">
            <div class="col form-outline mb-4">
              <input type="number" name="nik" id="form3Example3" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                placeholder="NIK" />
            </div>
            <!-- Nama input -->
            <div class="col form-outline mb-4">
              <input type="text" name="nama" id="form3Example4" class="fs-6 form-control  border-0 border-bottom rounded-0 form-control-lg"
                placeholder="Nama" />
            </div>
                </div>
            <!-- Username input -->
                <div class="row">
            <div class="col form-outline mb-4">
                <input type="text" name="username" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                  placeholder="Enter Username" />
              </div>
               <!-- Password input -->
            <div class="col form-outline mb-4">
                <input type="password" name="password" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                  placeholder="Password" />
              </div>
                </div>

              <!-- No Telepon input -->
            <div class="form-outline mb-4">
                <input type="number" name="telp" id="form3Example4" class="fs-6 form-control border-0 border-bottom rounded-0 form-control-lg"
                  placeholder="No Telepon" />
              </div>

            {{-- <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div> --}}

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-success btn-lg w-100"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
              <p class="small mt-2 pt-1 mb-0">Sudah Punya Akun? <a href="/login"
                  class="fw-bold link-danger">Masuk</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection
