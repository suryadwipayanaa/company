@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Welcome Back , {{ auth()->user()->name }}</h4>
    </div>
      <div class="dashboard">
        <div class="row">
          <div class="col-sm-12 col-md-3">
            <a href="/dashboard/blogs">
              <div class="card p-2">
                <div class="row align-items-center">
                  <div class="col-sm-6 col-md-6">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <p>Total Blogs</p>
                    <p><span>{{ $blogs->count() }}</span> Blogs</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
         </div>
      </div>
    </div>
  </main>
@endsection