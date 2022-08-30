@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>What People Say</h4>
    </div>
   <div class="row">
    <div class="col-lg-8">
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
    </div>
   </div>
    <a href="/dashboard/say/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Course</a>
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-striped table-sm text-center" >
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($say as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->name }}</td>
                        <td>
                            <img style="width:50px; object-fit:cover;" src="{{ asset('storage/' .$s->image) }}">
                        </td>
                        <td>
                            <a href="/dashboard/say/{{ $s->slug }}" class="eye"><span data-feather="eye"></span></a>
                            <a href="/dashboard/say/{{ $s->slug }}/edit" class="ubah"><span data-feather="edit"></span></a>
                            <form action="/dashboard/say/{{ $s->slug }}" method="POST" class="d-inline">
                              @method('delete')
                              @csrf
                              <button type="submit" class="delete border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-square"></span></button>
                            </form>
                        </td>
                      </tr>    
                    @endforeach      
                </tbody>
              </table>
        </div>

        {{-- <div class="d-flex justify-content-center">
          {{ $course->Links() }}
        </div> --}}
    </div>
  </main>
@endsection
