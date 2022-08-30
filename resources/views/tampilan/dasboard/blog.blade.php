@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex">
                <a href="/dashboard/blogs" class="back"><span data-feather="arrow-left"></span>Back To My Posts</a>
                <a href="/dashboard/blogs/{{ $blogs->slug }}/edit" class="edit"><span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/blogs/{{ $blogs->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span> Delete</button>
                  </form>
            </div>
            <div class="gambar" style="width:300px; margin-top:20px">
                <img src="{{ asset('storage/' . $blogs->image) }}" width="100%" style="object-fit: cover">
            </div>
            <div class="title mt-3">
                <h5>{{ $blogs->title }}</h5>
                <p>By Jolly Roger Official in <a href="">{{ $blogs->category->title }}</a></p>
                <p class="card-text"><small class="text-muted">Last updated {{ $blogs->created_at->diffForHumans() }}</small></p>
                <hr>
                <p>{!! $blogs->desFull !!}</p>
            </div>
        </div>
  </main>
@endsection