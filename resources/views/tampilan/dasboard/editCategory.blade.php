@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Edit Category</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/category/{{ $category->slug }}" enctype="multipart/form-data">
              @method('put')
                @csrf
                <input type="hidden" name="oldImage" value="{{ $category->image }}">
                <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" placeholder="Enter Your category" value="{{ old('category',$category->category) }}" id="category" required>
                    @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Enter Your Slug" required value="{{ old('slug',$category->slug) }}">
                  <div id="slug" class="form-text">slug will be automatically generated</div>
                  @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Image</label>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <img class="preview img-fluid mb-2" src="{{ asset('storage/' . $category->image) }}">
                    </div>
                  </div>
                  <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                  @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Update Category</button>
              </form>
        </div>
    </div>

  </main>
    <script>

      const category = document.querySelector('#category')
      const slug = document.querySelector('#slug')

      category.addEventListener('keyup', function(){
        const newCate = category.value
        slug.value = newCate.replace(/ /g,"-").toLowerCase()
      })     

      previewImage = () =>{
        const image = document.querySelector('#image')
        const preview = document.querySelector('.preview')

        preview.style.display = 'block'
        preview.style.width = '300px'
        preview.style.marginBottom = '20px'

        const reader = new FileReader()
        reader.readAsDataURL(image.files[0])

        reader.onload=(e)=>{
          preview.src = e.target.result
        }
      }


    </script>
@endsection