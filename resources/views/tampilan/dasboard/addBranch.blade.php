@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4>Add New Branch</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/branch" enctype="multipart/form-data">
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
                  <label for="alamat" class="form-label">Streat</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Enter Your Street" required value="{{ old('alamat') }}">
                  @error('alamat')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="maps" class="form-label">Link Maps</label>
                  <input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps" name="maps" placeholder="Enter Your Street" required value="{{ old('maps') }}">
                  @error('maps')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="telp" class="form-label">Telp</label>
                  <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" required placeholder="Enter Your Telp" value="{{ old('telp') }}">
                  @error('telp')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="whattsapp" class="form-label">WhatsApp</label>
                  <input type="text" class="form-control @error('whattsapp') is-invalid @enderror" id="whattsapp" name="whattsapp" placeholder="Enter Your WhatsApp" required value="{{ old('whattsapp') }}">
                  @error('whattsapp')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="instagram" class="form-label">Instagram</label>
                  <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="Enter Your Instagram" required value="{{ old('instagram') }}">
                  @error('instagram')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Your Email" required value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Image</label>
                  <div class="row">
                    <div class="col-sm-12 col-md-6 mb-2">
                        <img class="preview img-fluid">
                    </div>
                  </div>
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
                      <input id="deskripsi" type="hidden" name="deskripsi" required value={{ old('deskripsi') }}>
                      <trix-editor input="deskripsi"></trix-editor>
                  </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5 mt-3">Create Branch</button>
              </form>
        </div>
    </div>
  </main>

  <script>

    const name = document.querySelector('#name')
    const slug = document.querySelector('#slug')

    name.addEventListener('keyup', function(){
        let newName = name.value;
        slug.value = newName.replace(/ /g,"-").toLowerCase()
    })

    previewImage = () =>{
        const image = document.querySelector('#image')
        const preview = document.querySelector('.preview')

        preview.style.display = 'block'

        const Reader = new FileReader();
        Reader.readAsDataURL(image.files[0]);

        Reader.onload = (e) =>{
            preview.src = e.target.result;
        }
    }

    </script>
@endsection