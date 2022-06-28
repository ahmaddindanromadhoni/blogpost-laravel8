@extends('dashboard.layouts.main')
@section('blogpost')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">
            <h2>{{ $category->nama }}</h2>
                <a href="/dashboard/categories" class="btn btn-success"><span data-feather="arrow-left" ></span>Back To MyPosts</a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning text-white"><span data-feather="edit" ></span>Edit</a>
                <a href="" class="btn btn-danger"><span data-feather="x-circle" ></span>Delete</a>

            <article class="fs-5">
                <p> {!! $category->nama !!} </p>
            </article>
        </div>
    </div>
</div>
@endsection