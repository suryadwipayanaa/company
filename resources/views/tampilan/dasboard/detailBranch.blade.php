@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Detail Of {{ $branch->name }}</h4>
    </div>
    <div class="d-flex mb-2">
      <a href="/dashboard/branch" class="back"><span data-feather="arrow-left"></span>Back To My Branch</a>
      <a href="/dashboard/branch/{{ $branch->slug }}/edit" class="edit"><span data-feather="edit"></span>Edit</a>

      <form action="/dashboard/branch/{{ $branch->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span> Delete</button>
      </form>
  </div>
    <div class="detailBranch">
    <div class="card mb-3">
        <img src="{{ asset('storage/' .$branch->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
        <div class="card-body">
          <h5 class="card-title">{{ $branch->name }}</h5>
          <p>{!! $branch->deskripsi !!}</p>
          <p class="card-text">
            <a href="{{ $branch->maps }}">
                <i class="bi bi-geo-alt-fill"></i> {{ $branch->alamat }}
            </a>
        </p>
          <p class="card-text">
            <i class="bi bi-telephone-outbound-fill"></i> {{ $branch->telp }}
        </p>
          <p class="card-text">
            <a href="https://wa.me/{{ $branch->whattsapp }}">
                <i class="bi bi-whatsapp"></i> {{ $branch->whattsapp }}
            </a>
            </p>
          <p class="card-text">
            <a href="https://instagram.com/{{ $branch->instagram }}?igshid=YmMyMTA2M2Y=">
                <i class="bi bi-instagram"></i> {{ $branch->instagram }}
            </a>
            </p>
          <p class="card-text">
            <a href="mailto:{{ $branch->email }}">
                <i class="bi bi-envelope-fill"></i> {{ $branch->email }}
            </a>
        </p>
          <a href="{{ $branch->maps }}" class="btn map"><i class="bi bi-geo-alt-fill"></i> See On Map</a>
        </div>
      </div>
    </div>
  </main>
@endsection