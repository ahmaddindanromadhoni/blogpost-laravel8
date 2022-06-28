@extends('layouts.main')
@section('blogpost')
<div class="container mt-4">
<h1 class="text-center mb-3">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="/blog">
          @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search...." name="search" value="{{ request('search') }}" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
              <button class="btn btn-danger" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>

@if ($posts->count())
<div class="card mb-3">
  @if ($posts[0]->image)
  <div style="max-height: 400px; overflow:hidden">
      <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" alt="{{ $posts[0]->category->nama }}" width="100%"> 
  </div>
      @else 
      <img class="mt-3" src="https://source.unsplash.com/1200x500?{{ $posts[0]->category->nama }}" class="img-fluid" alt="{{ $posts[0]->category->nama }}" width="100%">
  @endif
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
    <p>
      <small class="text-muted">
        By. <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->nama }}</a> {{ $posts[0]->created_at->diffForHumans() }}
      </small>
    </p>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>

    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
        
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute px-3 py-2" style="background-color: rgba(255, 0, 0, 0.7)"><a href="/blog?category={{ $post->category->slug }}"  class="text-white text-decoration-none">{{ $post->category->nama }}</a></div>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->nama }}" width="100%"> 
            @else 
            <img src="https://source.unsplash.com/500x400?{{ $post->category->nama }}" class="card-img-top" alt="{{ $post->category->nama }}">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p>
            <small class="text-muted">
              By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
            </small>
          </p>
          <p class="card-text">{{ $post->excerpt }}</p>
          <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
    <p class="text-center fs-4">No Posts found.</p>
@endif

<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>
  </div>
    @endsection