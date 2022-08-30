@extends('layout.layout')

@section('header')
    <div class="container mt-2">
        <div class="title">
            <h2>Jadwal {{ $boking->hari }}</h2>
            <p class="more">{{ $boking->jam }}</p>
        </div>
    </div>
@endsection