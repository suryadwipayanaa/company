@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Edit Team</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/teams/{{ $team->slug }}" enctype="multipart/form-data">
              @method('put')
                @csrf
                <input type="hidden" name="oldImage" value="{{ $team->image }}">
                <input type="hidden" name="oldTeamImage" value="{{ $team->teamImage }}">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Your name" value="{{ old('name',$team->name) }}" id="name" required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Enter Your Slug" required value="{{ old('slug',$team->slug) }}">
                  <div id="slug" class="form-text">slug will be automatically generated</div>
                  @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" name="level" placeholder="Enter Your Price" required value="{{ old('level',$team->level) }}">
                    @error('level')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="join" class="form-label">Joined</label>
                    <input type="datetime-local" class=" @error('join') is-invalid @enderror" id="join" name="join" required value="{{ old('join',$team->join) }}">
                    @error('join')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <div class="mb-3">
                  <label for="image" class="form-label">Background</label>
                  @if($team->image)
                   <div class="row">
                    <div class="col-sm-12 col-md-6 mb-2">
                      <img src="{{ asset('storage/'.$team->image) }}" class="preview img-fluid">
                    </div>
                   </div>
                  @endif
                  <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                  @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="teamImage" class="form-label">Profile</label>
                  @if($team->teamImage)
                  <div class="row">
                    <div class="col-sm-12 col-md-6 mb-2">
                      <img src="{{ asset('storage/'.$team->teamImage) }}" class="profileImage img-fluid">
                    </div>
                  </div>
                  @endif
                  <input class="form-control @error('teamImage') is-invalid @enderror" type="file" name="teamImage" id="teamImage" onchange="profileImage()">
                  @error('teamImage')
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
                    <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi',$team->deskripsi) }}">
                    <trix-editor input="deskripsi"></trix-editor>
                </div>
        
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create Team</button>
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

        const profileImage= () =>{
          const image = document.querySelector('#teamImage');
          const preview = document.querySelector('.profileImage')

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