@extends('layout.dashboard.dasboard')
    

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Add New Promo</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/promo" enctype="multipart/form-data">
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
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Enter Your Slug" required value="{{ old('slug') }}">
                  <div id="slug" class="form-text">slug will be automatically generated</div>
                  @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="diskon" class="form-label">Diskon</label>
                  <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Enter Your Diskon" name="diskon" required value="{{ old('diskon') }}">
                  @error('diskon')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="hargaAwal" class="form-label">Harga Awal</label>
                  <input type="text" class="form-control @error('hargaAwal') is-invalid @enderror" id="hargaAwal" placeholder="Enter First Price" name="hargaAwal" required value="{{ old('hargaAwal') }}">
                  @error('hargaAwal')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="hargaAkhir" class="form-label">Harga Akhir</label>
                  <input type="text" class="form-control @error('hargaAkhir') is-invalid @enderror" id="hargaAkhir" placeholder="Enter Your Last Price" name="hargaAkhir" required value="{{ old('hargaAkhir') }}">
                  @error('hargaAkhir')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="expiret" class="form-label">Berlaku Sampai</label>
                  <input type="datetime-local" class=" @error('expiret') is-invalid @enderror" id="expiret" name="expiret" required value="{{ old('expiret') }}">
                  @error('expiret')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label for="formFile" class="form-label">Post Image</label>
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

                <div class="mb-3">
                  <label for="fasilitas" class="form-label">Fasilitas</label>
                  @error('fasilitas')
                    {{ $message }}
                  @enderror
                    <input id="fasilitas" type="hidden" name="fasilitas" required value={{ old('fasilitas') }}>
                    <trix-editor input="fasilitas"></trix-editor>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create Promo</button>
              </form>
        </div>
    </div>

  </main>

    <script>
  
      const title = document.querySelector('#title')
      const slug = document.querySelector('#slug')

      title.addEventListener('keyup', function(){
          let newSlug = title.value;
          newSlug = newSlug.replace(/ /g,"-")
          slug.value = newSlug.toLowerCase();
      })

      const previewImage=()=>{
        const image = document.querySelector('#image');
        const preview = document.querySelector('.preview');

        preview.style.display = 'block'

        let reader = new FileReader();
        reader.readAsDataURL(image.files[0])

        reader.onload = (e)=>{
            preview.src = e.target.result;
        }
      }

      const diskon = document.querySelector('#diskon')
      const hargaAwal = document.querySelector('#hargaAwal')
      const hargaAkhir = document.querySelector('#hargaAkhir')

      hargaAwal.addEventListener('keyup', function(){
        let newDiskon = parseInt(diskon.value)
        let newHargaAwal = parseInt(hargaAwal.value)

        const result = newHargaAwal - (newDiskon / 100 * newHargaAwal);

        hargaAkhir.value = result;
        

      })
  
  </script>
@endsection

