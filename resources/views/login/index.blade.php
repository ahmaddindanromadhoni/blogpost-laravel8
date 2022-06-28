@extends('layouts.main')
@section('blogpost')
<div class="row d-flex justify-content-center">
    <div class="col-md-4">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('LoginError') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/login" method="POST">
              @csrf
              <div class="form-floating">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan Email" autofocus required value="{{ old('email') }}">
                @error('email')
                   <div class="invalid-feedback">
                     {{ $message }}
                   </div>
                @enderror
              </div>
              <div class="form-floating">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Belum Registrasi? <a href="/register" class="text-decoration-none">Registrasi Now</a></small>
          </main>
    </div>
</div>

@endsection