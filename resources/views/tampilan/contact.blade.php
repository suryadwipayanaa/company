@extends('layout.layout')

@section('header')
<div class="container branch my-3">
    <div class="part">
        <div class="aboutTitle text-center">
            <h3>Contact <span>Of</span> Jolly<span> Roger</span></h3>
        </div>
        <div class="row justify-content-center">
            @foreach($branch as $b)
            <div class="col-sm-12 col-md-4 mt-3">
                <div class="card">
                    <img src="{{ asset('storage/' .$b->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $b->name }}</h5>
                      <p>{!! $b->deskripsi !!}</p>
                      <p class="card-text">
                        <a href="{{ $b->maps }}">
                            <i class="bi bi-geo-alt-fill"></i> {{ $b->alamat }}
                        </a>
                    </p>
                      <p class="card-text">
                        <i class="bi bi-telephone-outbound-fill"></i> {{ $b->telp }}
                    </p>
                      <p class="card-text">
                        <a href="https://wa.me/{{ $b->whattsapp }}">
                            <i class="bi bi-whatsapp"></i> {{ $b->whattsapp }}
                        </a>
                        </p>
                      <p class="card-text">
                        <a href="https://instagram.com/{{ $b->instagram }}?igshid=YmMyMTA2M2Y=">
                            <i class="bi bi-instagram"></i> {{ $b->instagram }}
                        </a>
                        </p>
                      <p class="card-text">
                        <a href="mailto:{{ $b->email }}">
                            <i class="bi bi-envelope-fill"></i> {{ $b->email }}
                        </a>
                    </p>
                      <a href="{{ $b->maps }}" class="btn map"><i class="bi bi-geo-alt-fill"></i> See On Map</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection