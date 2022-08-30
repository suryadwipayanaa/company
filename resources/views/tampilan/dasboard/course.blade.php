@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Our Course</h4>
    </div>
   <div class="row">
    <div class="col-lg-8">
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      @if(session()->has('successUpdated'))
      <div class="alert alert-success" role="alert">
        {{ session('successUpdated') }}
      </div>
      @endif
      @if(session()->has('successDelete'))
      <div class="alert alert-danger" role="alert">
        {{ session('successDelete') }}
      </div>
      @endif
    </div>
   </div>
    <a href="/dashboard/course/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Course</a>
    <div class="search" style="display: flex; justify-content:center; margin-bottom:10px">
      <form action="/dashboard/course" class="form" style="width:40%; display:flex; justify-content:end">
        <input class="form-control me-2" type="search" placeholder="Search..." name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-striped table-sm text-center" >
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
             @if($course->count())
             @foreach($course as $c)
             <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td>{{ $c->title }}</td>
                 <td>
                     <img style="width:50px; object-fit:cover;" src="{{ asset('storage/'.$c->image) }}">
                 </td>
                 <td>Rp.{{ $c->harga }}</td>
                 <td>
                     <a href="/dashboard/course/{{ $c->slug }}" class="eye"><span data-feather="eye"></span></a>
                     <a href="/dashboard/course/{{ $c->slug }}/edit" class="ubah"><span data-feather="edit"></span></a>
                     <form action="/dashboard/course/{{ $c->slug }}" method="POST" class="d-inline">
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
              <td class="text-center">NO COURSE</td>
              <td></td>
              <td></td>
            </tr>        
             @endif
                  
                </tbody>
              </table>
        </div>

        <div class="d-flex justify-content-center">
          {{ $course->Links() }}
        </div>
    </div>
  </main>
@endsection
