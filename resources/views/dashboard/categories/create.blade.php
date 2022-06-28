@extends('dashboard.layouts.main')

@section('blogpost')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Pots</h1>
</div>
<div class="col-sm-8">
  <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary mb-3">Create New Category</button>
  </form>
</div>
<script>
  const title = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/categories/slugCategory?name=' + title.name)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endsection