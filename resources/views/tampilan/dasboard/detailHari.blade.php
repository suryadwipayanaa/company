@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Detail Hari</h4>
    </div>
    <p>Hari : {{ $hari->hari }}</p>
    <p>Tanggal : {{ $hari->tanggal }}</p>
    <p>Tutor : {{ $hari->team->name }}</p>
    <img src="{{ asset('storage/'.$hari->team->teamImage) }}" style="width:300px">
    <p class="mt-2">Detail Jam Mengajar</p>
    @if($hari->jam)
    <p class="btn btn-primary">{{ $hari->jam }}</p>
    @else
    @endif
    @if($hari->jam2)
    <p class="btn btn-primary">{{ $hari->jam2 }}</p>
    @else
    @endif
    @if($hari->jam3)
    <p class="btn btn-primary">{{ $hari->jam3 }}</p>
    @else
    @endif
    @if($hari->jam4)
    <p class="btn btn-primary">{{ $hari->jam4 }} </p>
    @else
    @endif
    @if($hari->jam5)
    <p class="btn btn-primary">{{ $hari->jam5 }}</p>
    @else
    @endif
    @if($hari->jam6)
    <p class="btn btn-primary">{{ $hari->jam6 }}</p>
    @else
    @endif
    @if($hari->jam7)
    <p class="btn btn-primary">{{ $hari->jam7 }}</p>
    @else
    @endif
    @if($hari->jam8)
    <p class="btn btn-primary">{{ $hari->jam8 }}</p>
    @else
    @endif
    @if($hari->jam9)
    <p class="btn btn-primary">{{ $hari->jam9 }}</p>
    @else
    @endif
  </main>
@endsection