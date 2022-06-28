@extends('layouts.main')
@section('blogpost')
<div class="row d-flex justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
            <form action="/register" method="POST">
              @csrf
              <div class="form-floating">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Masukan Nama" required value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Masukan Username" required value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <label for="floatingInput">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Masukan Email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
            </form>
            <small class="d-block text-center mt-3">Sudah Punya Akun? <a href="/login">Login Now</a></small>
          </main>
    </div>
</div>

@endsection