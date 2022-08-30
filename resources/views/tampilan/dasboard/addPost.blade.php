@extends('layout.dashboard.dasboard')
    

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Add New Post</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/blogs" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter Your Title" value="{{ old('title') }}" id="title" required>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                  <div id="slug" class="form-text">slug will be automatically generated</div>
                  @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="category_id" class="form-label">Category</label>
                  <select class="form-select" name="category_id" required>
                    @foreach($category as $cate)
                    @if(old('category_id') == $cate->id)
                    <option value="{{ $cate->id }}" selected>{{ $cate->category }}</option>
                    @else
                    <option value="{{ $cate->id }}">{{ $cate->category }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Post Image</label>
                  <img class="preview img-fluid">
                  <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                  @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="desFull" class="form-label">Deskripsi</label>
                  @error('desFull')
                    {{ $message }}
                  @enderror
                    <input id="desFull" type="hidden" name="desFull" required>
                    <trix-editor input="desFull"></trix-editor>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create Post</button>
              </form>
        </div>
    </div>

  </main>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
    
        title.addEventListener('keyup', function(){
            let preSlug = title.value;
            preSlug = preSlug.replace(/ /g,"-")
            slug.value = preSlug.toLowerCase()
        })
       
        
        const previewImage= () =>{
          const image = document.querySelector('#image');
          const preview = document.querySelector('.preview')

          preview.style.display = 'block';
          preview.style.width = '300px';
          preview.style.marginBottom = '10px'

          const reader = new FileReader()
          reader.readAsDataURL(image.files[0]);

          reader.onload = (e) =>{
            preview.src = e.target.result;
          }
        }
    </script>
@endsection
