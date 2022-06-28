@extends('dashboard.layouts.main')
@section('blogpost')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" ></span>Back To MyPosts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-white"><span data-feather="edit" ></span>Edit</a>
                <a href="" class="btn btn-danger"><span data-feather="x-circle" ></span>Delete</a>
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img class="mt-3" src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->nama }}" width="100%"> 
                </div>
                   @else 
                   <img class="mt-3" src="https://source.unsplash.com/1200x500?{{ $post->category->nama }}" class="img-fluid" alt="{{ $post->category->nama }}" width="100%">
                @endif

            <article class="fs-5">
                <p> {!! $post->body !!} </p>
            </article>
        </div>
    </div>
</div>
@endsection