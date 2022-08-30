@extends('layout.dashboard.dasboard')
    

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Blogs</h4>
    </div>

    <div class="row">
      <div class="col-lg-10">
    <div class="table-responsive">
      @if(session()->has('succes'))
      <div class="alert alert-success" role="alert">
        {{ session('succes') }}
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
      <a href="/dashboard/blogs/create" style="font-size: 0.9em" class="btn btn-primary my-3"><span data-feather="plus-square"></span> Add New Post</a>
      <div class="search" style="display: flex; justify-content:end; margin-bottom:10px">
        <form action="/dashboard/blogs" class="form" style="width:40%; display:flex; justify-content:end">
          <input class="form-control me-2" type="search" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
      <table class="table table-striped table-sm" >
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Images</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @if($blogs->count())
            @foreach($blogs as $blog)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $blog->title }}</td>
              <td>{{ $blog->category->category }}</td>
              <td>
                  <img style="width:50px; object-fit:cover;" src="{{ asset('storage/' . $blog->image) }}">
              </td>
              <td>
                  <a href="/dashboard/blogs/{{ $blog->slug }}" class="eye"><span data-feather="eye"></span></a>
                  <a href="/dashboard/blogs/{{ $blog->slug }}/edit" class="ubah"><span data-feather="edit"></span></a>
                  <form action="/dashboard/blogs/{{ $blog->slug }}" method="POST" class="d-inline">
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
              <td class="text-center">NO POST</td>
              <td></td>
              <td></td>
            </tr>
            @endif
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
      <div class="d-flex justify-content-center">
        {{ $blogs->Links() }}
      </div>

    </div>
</main>
@endsection

