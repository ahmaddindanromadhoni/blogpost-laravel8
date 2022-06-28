@extends('layouts.main')
@section('blogpost')
<div class="container mt-3">
    <h1>Halaman About</h1>
    <h3>{{ $nama }}</h3>
    <h4>{{ $email }}</h4>
    <h4>{{ $sekolah }}</h4>
</div>
@endsection