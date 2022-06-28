@extends('layouts.main')
@section('blogpost')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            <p>By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->nama }}</a></p>
            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img class="mt-3" src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->nama }}" width="100%"> 
                </div>
                   @else 
                   <img src="https://source.unsplash.com/1200x500?{{ $post->category->nama }}" class="img-fluid" alt="{{ $post->category->nama }}">
                @endif
                
            <article class="fs-5">
                <p> {!! $post->body !!} </p>
            </article>
            <a href="/blog" class="text-decoration-none">Back To Posts</a>
        </div>
    </div>
</div>
@endsection