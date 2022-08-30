@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Category</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
      <div class="table-responsive">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        @if(session()->has('deleteSucces'))
        <div class="alert alert-danger" role="alert">
          {{ session('deleteSucces') }}
        </div>
        @endif
        @if(session()->has('updatedSucces'))
        <div class="alert alert-success" role="alert">
          {{ session('updatedSucces') }}
        </div>
        @endif
        <a href="/dashboard/category/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Category</a>
        <table class="table table-striped table-sm text-center" >
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
  
         @foreach($category as $cate)
         <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $cate->category }}</td>
          <td>
              <img style="width:50px; object-fit:cover;" src="{{ asset('storage/'.$cate->image) }}">
          </td>
          <td>
              <a href="/dashboard/category/{{ $cate->slug }}/edit" class="ubah"><span data-feather="edit"></span></a>
              <form action="/dashboard/category/{{ $cate->slug }}" method="POST" class="d-inline">
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
      </div>
    </div>

      </div>
  </main>
@endsection