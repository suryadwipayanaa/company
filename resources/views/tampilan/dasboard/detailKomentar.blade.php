@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Detail Komentar Of {{ $komentar->name }}</h4>
    </div>
    <div class="d-flex mb-2">
        <a href="/dashboard/komentar" class="back me-2"><span data-feather="arrow-left"></span>Back To My Said</a>
        <form action="/dashboard/komentar/{{ $komentar->id }}" method="POST" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span> Delete</button>
        </form>
    </div>
    <div class="card mb-3">
        <img src="{{ url('/images/user.jpg') }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
        <div class="card-body">
            <h5 class="card-title">{{ $komentar->name }}</h5>
            <strong>{{ $komentar->email }}</strong>
            <p class="card-text">{{ $komentar->komentar }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ $komentar->created_at->diffForHumans() }}</small></p>
          </div>
    </div>
  </main>
@endsection
