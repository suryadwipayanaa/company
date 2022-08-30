@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Add New Said</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/say" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Your name" value="{{ old('name') }}" id="name" required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Enter Your Slug" required value="{{ old('slug') }}">
                  <div id="slug" class="form-text">slug will be automatically generated</div>
                  @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="image" class="form-label">Gambar</label>
                  <img class="preview img-fluid">
                  <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                  @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  @error('deskripsi')
                    {{ $message }}
                  @enderror
                    <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi') }}">
                    <trix-editor input="deskripsi"></trix-editor>
                </div>
        
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create</button>
              </form>
        </div>
    </div>

  </main>
    <script>

      const title = document.querySelector('#name')
      const slug = document.querySelector('#slug')

      title.addEventListener('keyup', function(){
          let newSlug = title.value;
          newSlug = newSlug.replace(/ /g,"-")
          slug.value = newSlug.toLowerCase();
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