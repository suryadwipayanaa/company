@extends('layout.layout')

@section('header')
<div class="detailPromo">
    <div class="container">
        <h3 class="my-4">Details {{ $promo->title }} </h3>
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $promo->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">{{ $promo->title }}</h5>
                <p class="card-text diskon"><i class="bi bi-scissors"></i> Diskon {{ $promo->diskon }}% Off</p>
                <p class="card-text">{!! $promo->deskripsi !!}</p>
                <p class="card-text">Promo Sampai {{ $promo->expiret }}</p>
                <div class="price">
                  <span class="awal">Rp. {{ $promo->hargaAwal }}</span>
                  <span class="akhir">Rp. {{ $promo->hargaAkhir }}</span>
                </div>
                <div class="fisilitas mt-3 mb-2">
                    <p>{!! $promo->fasilitas !!}</p>
                </div>
                <a href="#" class="btn buy mb-3"><i class="bi bi-credit-card-fill"></i> Buy It</a>
                <p class="card-text"><small class="text-muted">Last updated {{ $promo->created_at->diffForHumans() }}</small></p>
              </div>
        </div>
    </div>
</div>
@endsection