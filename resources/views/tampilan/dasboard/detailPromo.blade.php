@extends('layout.dashboard.dasboard')
    

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Detail Promo</h4>
    </div>
    <div class="d-flex mb-2">
        <a href="/dashboard/promo" class="back"><span data-feather="arrow-left"></span>Back To My Promo</a>
        <a href="/dashboard/promo/{{ $promo->slug }}/edit" class="edit"><span data-feather="edit"></span>Edit</a>

        <form action="/dashboard/promo/{{ $promo->slug }}" method="POST" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span> Delete</button>
        </form>
    </div>
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $promo->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
        <div class="card-body">
            <h5 class="card-title">{{ $promo->title }}</h5>
            <p class="card-text">{!! $promo->deskripsi !!}</p>
            <p class="card-text">Diskon {{ $promo->diskon }}% Off</p>
            <p class="card-text">Promo Sampai {{ $promo->expiret }}</p>
            <div class="price">
              <span class="awal">Rp. {{ $promo->hargaAwal }}</span>
              <span class="akhir">Rp. {{ $promo->hargaAkhir }}</span>
            </div>
            <div class="fisilitas mt-3 mb-2">
                <p>{!! $promo->fasilitas !!}</p>
            </div>
            <p class="card-text"><small class="text-muted">Last updated {{ $promo->created_at->diffForHumans() }}</small></p>
          </div>
    </div>
  </main>
@endsection