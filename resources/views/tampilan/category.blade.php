@extends('layout.layout')

@section('header')
    <div class="category my-3">
        <div class="container">
            <div class="title">
                <h3>All Of Our <span>Category</span></h3>
            </div>
                <div class="row">
                    @if($category->count())
                        @foreach($category as $cate)
                        <div class="col-sm-12 col-md-4 mb-3">
                            <div class="card">
                                <a href="/blogs?category={{ $cate->slug }}"><strong>{{ $cate->category }}</strong></a>
                                <img src="{{ asset('storage/'.$cate->image) }}">
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-center bg-danger p-3" style="color: #fff; width:fit-content; margin:20px auto; border-radius:6px">Category Doesn't Axis</p>
                    @endif
                </div>
        </div>
    </div>
@endsection

