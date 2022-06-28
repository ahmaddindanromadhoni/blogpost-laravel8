@extends('dashboard.layouts.main')
@section('blogpost')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create post</a>
    <div class="table-responsive col-md-9">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->nama }}</td>
              <td>
                  <a  class="badge bg-info" href="/dashboard/posts/{{ $post->slug }}/edit"><span data-feather="edit"></span></a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                  </form>
                  <a class="badge bg-success" href="/dashboard/posts/{{ $post->slug }}"><span data-feather="eye" ></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection