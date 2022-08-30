@extends('layout.layout')

@section('header')
<div class="blogs" id="blogs">
    <div class="container">
        {{-- text started --}}
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>All Blog's At Jolly Roger</h2>
                <p>Our Blog's Has Many Histories About Jolly Roger</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <form action="/blogs">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="d-flex align-items-center" role="search" >
                        <input class="form-control" type="search" placeholder="Search......" style="height: fit-content; padding:10px 5px; margin-right:10px" name="search" value="{{ request('search') }}">
                        <button class="more" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        @if($blogs->count())
        {{-- text finished--}}
        {{-- bigest card started --}}
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <a href="/" style="text-decoration: none">
                    <div class="card mb-3">
                        <div class="category">
                            <a href="/blogs?category={{ $blogs[0]->category->slug }}">{{ $blogs[0]->category->category }}</a>
                        </div>
                        <img src="{{ asset('storage/' . $blogs[0]->image) }}" class="card-img-top" alt="..." style="height: 300px; background-position-y: -750px; object-fit:cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blogs[0]->title }}</h5>
                            <p class="card-text">{{ $blogs[0]->desSingkat }}</p>
                            <p class="card-text"><small class="text-muted">Last updated {{ $blogs[0]->created_at->diffForHumans() }}</small></p>
                            <a href="/blog/{{ $blogs[0]->slug }}" class="more" href="">Read More</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{-- bigest card finished--}}
        {{-- small card started --}}
        <div class="row justify-content-evenly">
            @foreach($blogs->skip(1) as $blog)
            <div class="col-sm-12 col-md-4 mt-4">
                <a href="/blog/{{ $blog->slug }}" style="text-decoration: none">
                <div class="card">
                    <div class="category">
                        <a href="/blogs?category={{ $blog->category->slug }}">{{ $blog->category->category }}</a>
                    </div>
                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $blog->title }}</h5>
                      <p class="card-text">{{ $blog->desSingkat }}</p>
                      <p class="card-text"><small class="text-muted">Last updated {{ $blog->created_at->diffForHumans() }}</small></p>
                      <a href="/blog/{{ $blog->slug }}" class="more">Read More</a>
                    </div>
                  </div>
                </a>
            </div>
            @endforeach
        </div>
        {{-- small card finsihed --}}
        @else 
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-3 text-center">
                <h1>Any Post Doesn't Axis</h1>
            </div>
          </div>
        @endif
    </div>
</div>
@endsection

@section('content')
    <div class="d-flex justify-content-center my-5">
        {{ $blogs->links() }}
    </div>
@endsection