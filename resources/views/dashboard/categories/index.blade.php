@extends('dashboard.layouts.main')
@section('blogpost')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Category</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create Category</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Nama</th>
              <th scope="col" width="25%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->nama }}</td>
              <td>
                  <a  class="badge bg-info" href="/dashboard/categories/{{ $category->id }}/edit"><span data-feather="edit"></span></a>
                  <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                  </form>
                  <a class="badge bg-success" href="/dashboard/categories/{{ $category->slug }}"><span data-feather="eye" ></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection