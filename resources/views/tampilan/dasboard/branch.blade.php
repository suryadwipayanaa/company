@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Apart Of Jolly Roger</h4>
    </div>

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

    <a href="/dashboard/branch/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Branch</a>
   <div class="row">
    <div class="col-lg-10">
        <table class="table table-striped text-center" >
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Name</th>
                <th scope="col">Streat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             
          @if($branch->count())
          @foreach($branch as $b)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img style="width:50px; object-fit:cover;" src="{{ asset('storage/'.$b->image) }}">
            </td>
            <td>{{ $b->name }}</td>
            <td>{{ $b->alamat }}</td>
            <td>
                <a href="/dashboard/branch/{{ $b->slug }}" class="eye"><span data-feather="eye"></span></a>
                <a href="/dashboard/branch/{{ $b->slug }}/edit" class="ubah"><span data-feather="edit"></span></a>
                <form action="/dashboard/branch/{{ $b->slug }}" method="POST" class="d-inline">
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
            <td class="text-center">NO BRANCH ADDED</td>
            <td></td>
            <td></td>
          </tr>

          @endif
            </tbody>
          </table>
    </div>
   </div>
  </main>
@endsection
