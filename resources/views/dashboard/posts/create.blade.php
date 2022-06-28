@extends('dashboard.layouts.main')

@section('blogpost')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Pots</h1>
</div>
<div class="col-sm-8">
  <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
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
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select name="category_id" class="form-select" required>
        <option selected>Pilih Category</option>
        @foreach ($categories as $category)
          @if (old('category_id') == $category->id)
            <option value="{{ $category->id }} " selected>{{ $category->nama }}</option>
          @else
            <option value="{{ $category->id }} ">{{ $category->nama }}</option>
          @endif  
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <img class="img-preview img-fluid">
      <input class="form-control @error ('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
       </div>
    
    <button type="submit" class="btn btn-primary mb-3">Create New Post</button>
  </form>
</div>
<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/slugerror?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept' function(e){
    e.preventDefault();
  });

  function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFREader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
  }
</script>
@endsection