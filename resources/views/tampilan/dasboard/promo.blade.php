@extends('layout.dashboard.dasboard')
    

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Course Promo</h4>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif

    @if(session()->has('successUpdate'))
    <div class="alert alert-success" role="alert">
      {{ session('successUpdate') }}
    </div>
    @endif

    @if(session()->has('successDelete'))
    <div class="alert alert-danger" role="alert">
      {{ session('successDelete') }}
    </div>
    @endif
    <a href="/dashboard/promo/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Promo</a>
    <table class="table table-striped table-sm" >
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Gambar</th>
            <th scope="col">Diskon</th>
            <th scope="col">Harga Awal</th>
            <th scope="col">Harga Akhir</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @if($promo->count())
        @foreach($promo as $p)
        <tr>
           <td>{{ $loop->iteration }}</td>
           <td>{{ $p->title }}</td>
           <td>
               <img style="width:50px; object-fit:cover;" src="{{ asset('storage/' . $p->image) }}">
           </td>
           <td>{{ $p->diskon }}% Off</td>
           <td>{{ $p->hargaAwal }}</td>
           <td>{{ $p->hargaAkhir }}</td>
           <td>
               <a href="/dashboard/promo/{{ $p->slug }}" class="eye"><span data-feather="eye"></span></a>
               <a href="/dashboard/promo/{{ $p->slug }}/edit" class="ubah"><span data-feather="edit"></span></a>
               <form action="/dashboard/promo/{{ $p->slug }}" method="POST" class="d-inline">
                 @method('delete')
                 @csrf
                 <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span></button>
               </form>
           </td>
         </tr>
        @endforeach
        @else
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td class="text-center">NO PROMO ADDED</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @endif
          
        </tbody>
      </table>
  </main>

@endsection

