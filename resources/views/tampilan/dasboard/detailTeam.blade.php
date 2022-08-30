@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Detail Team {{ $team->name }}</h4>
    </div>
    <div class="d-flex mb-2">
        <a href="/dashboard/teams" class="back"><span data-feather="arrow-left"></span>Back To My Team</a>
        <a href="/dashboard/teams/{{ $team->slug }}/edit" class="edit"><span data-feather="edit"></span>Edit</a>

        <form action="/dashboard/teams/{{ $team->slug }}" method="POST" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span> Delete</button>
        </form>
    </div>
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $team->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
        <div class="card-body">
            <img src="{{ asset('storage/'.$team->teamImage) }}" style="width:150px">
            <h5 class="card-title mt-2">{{ $team->name }}</h5>
            <strong class="card-title">{{ $team->level }} At Jolly Roger Gianyar</strong>
            <p class="card-text">{!! $team->deskripsi !!}</p>
            <p class="card-text">Joined At {{ $team->join }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ $team->created_at->diffForHumans() }}</small></p>
          </div>
    </div>
  </main>
@endsection
