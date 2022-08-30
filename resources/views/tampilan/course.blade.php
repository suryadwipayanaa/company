@extends('layout.layout')

@section('header')
<div class="course">
    <div class="courseTitle text-center">
        <p>Our <span>Course</span></p>
        <h3>The <span>Best</span> Course Ever</h3>
    </div>
    <div class="row justify-content-center">
        @foreach($course as $c)
        <div class="col-sm-12 col-md-4 mt-3">
            <div class="card">
                <img src="{{ asset('storage/'.$c->image) }}" class="card-img-top" alt="..." style="width:100%">
                <div class="card-body">
                  <h5 class="card-title">{{ $c->title }}</h5>
                  <p class="card-text">{!! $c->deskripsi !!}</p>
                  <div class="price">
                    <span class="akhir">Rp. {{ $c->harga }}</span>
                  </div>
                  <a href="/detailcourse/{{ $c->slug }}" class="btn detail"><i class="bi bi-eye-fill"></i> Detail Course</a>         
                  <a href="/verify" class="btn buy" id="pay-button" style="cursor: pointer"><i class="bi bi-credit-card-fill"></i> Buy It</a>          
                </div>
             </div>
        </div>
        @endforeach
    </div>
</div>
@endsection