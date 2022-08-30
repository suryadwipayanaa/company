@extends('layout.layout')

@section('header')
    <div class="container">
        <div class="d-flex">
            
        </div>
        <div class="gambar" style="width:300px">
            <img src="{{ asset('storage/' . $blogs->image) }}" width="100%" style="object-fit: cover">
        </div>
        <div class="title">
            <h5>{{ $blogs->title }}</h5>
            <p>By Jolly Roger Official in <a href="/blogs?category={{ $blogs->category->slug }}">{{ $blogs->category->title }}</a></p>
            <p class="card-text"><small class="text-muted">Last updated {{ $blogs->created_at->diffForHumans() }}</small></p>
            <hr>
            <p>{!! $blogs->desFull !!}</p>
        </div>
    </div>
@endsection