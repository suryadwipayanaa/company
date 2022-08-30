@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Detail Course {{ $course->title }}</h4>
    </div>
    <div class="d-flex mb-2">
        <a href="/dashboard/course" class="back"><span data-feather="arrow-left"></span>Back To My Course</a>
        <a href="/dashboard/course/{{ $course->slug }}/edit" class="edit"><span data-feather="edit"></span>Edit</a>

        <form action="/dashboard/course/{{ $course->slug }}" method="POST" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span> Delete</button>
        </form>
    </div>
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
        <div class="card-body">
            <h5 class="card-title">{{ $course->title }}</h5>
            <p class="card-text">{!! $course->deskripsi !!}</p>
            <div class="price">
              <span class="akhir">Rp. {{ $course->harga}}</span>
            </div>
            <div class="fisilitas mt-3 mb-2">
                <p>{!! $course->fasilitas !!}</p>
            </div>
            <p class="card-text"><small class="text-muted">Last updated {{ $course->created_at->diffForHumans() }}</small></p>
          </div>
    </div>
  </main>
@endsection