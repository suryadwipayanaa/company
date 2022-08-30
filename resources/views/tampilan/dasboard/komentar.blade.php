@extends('layout.dashboard.dasboard')
    

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>People Comment</h4>
    </div>
   <div class="row">
    <div class="col-sm-12 col-md-8">
    
        @if(session()->has('successDelete'))
        <div class="alert alert-danger" role="alert">
          {{ session('successDelete') }}
        </div>
        @endif
        <div class="search" style=" margin-bottom:10px">
            <form action="/dashboard/komentar" class="form" style="width:60%; display:flex;">
              <input class="form-control me-2" type="search" placeholder="Search..." name="search" value="{{ request('search') }}">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        <table class="table table-striped table-sm text-center" >
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($komentar as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->name }}</td>
                    <td>
                        <a href="/dashboard/komentar/{{ $k->id }}" class="eye"><span data-feather="eye"></span></a>
                        <form action="/dashboard/komentar/{{ $k->id }}" method="POST" class="d-inline">
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
  </main>

@endsection

