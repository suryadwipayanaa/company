@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Jadwal Hari </h4>
    </div>
<div class="row">
    <div class="col-sm-12 col-lg-7">
        
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if(session()->has('successDelete'))
    <div class="alert alert-danger" role="alert">
        {{ session('successDelete') }}
      </div>
    @endif
    </div>
</div>

    <a href="/dashboard/hari/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Day</a>
   <div class="row">
    <div class="col-lg-7">
        <table class="table text-center" >
            <thead>
              <tr>
                <th scope="col">Tutor</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Hari</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            
            @foreach($team as $h)
             @if($h->level === 'Tutor')
                <tr>
                    <td rowspan= {{ $h->hari->count()+1}}>{{ $h->name }}</td>
                </tr>
                @if($h->hari->count())
                @foreach($h->hari as $t)  
                   <tr>
                        <td >{{ $t->tanggal}}</td>
                        <td >{{ $t->hari }}</td>
                        <td>
                            <a href="/dashboard/hari/{{ $t->id }}" class="eye"><span data-feather="eye"></span></a>
                            <a href="/dashboard/hari/{{ $t->id }}/edit" class="ubah"><span data-feather="edit"></span></a>
                            <form action="/dashboard/hari/{{ $t->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="1">Belum Ada Jadwal</td> 
                    </tr>
                @endif
             @endif
            @endforeach
  
            </tbody>
          </table>
    </div>
   </div>
  </main>
@endsection
