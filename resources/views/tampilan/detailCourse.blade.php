@extends('layout.layout')

@section('header')
<div class="detailPromo">
    <div class="container">
        <h3 class="my-4">Details {{ $ces->title }} </h3>
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $ces->image) }}" class="card-img-top img-fluid" style="height: 300px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">{{ $ces->title }}</h5>
                <p class="card-text">{!! $ces->deskripsi !!}</p>
                <div class="price">
                  <span class="akhir">Rp. {{ $ces->harga }}</span>
                </div>
                <div class="fisilitas mt-3 mb-2">
                    <p>{!! $ces->fasilitas !!}</p>
                </div>
                <a href="#" class="btn buy mb-3"><i class="bi bi-credit-card-fill"></i> Buy It</a>
              </div>
        </div>
    </div>
</div>
@endsection