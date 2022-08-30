@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Tambah Jam</h4>
    </div>
    <form action="/dashboard/jam" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="jam">
                    <label for="hari" class="form-label mb-3">Hari</label>
                    <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" placeholder="Enter Your hari" required value="{{ old('hari') }}">
                    @error('hari')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                    <div class="mb-3">
                        <label for="team_id" class="form-label">Tutor</label>
                        <select class="form-select" name="team_id" required>
                          @foreach($team as $cate)
                          @if(old('team_id') == $cate->id)
                          <option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>
                          @else
                          <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>

                    <label for="jam" class="form-label">Jam</label>
                    <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" placeholder="Enter Your Jam" required value="{{ old('jam') }}">
                    @error('jam')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <br>
                </div>
                <button name="tambah" id="tambah" class="btn btn-primary mt-3"><span data-feather="plus"></span></button>
                </div>
                <div class="row my-4">
                    <div class="col-lg-4">
                        <button type="submit" name="submit" class="btn btn-primary"><span data-feather="plus"></span>Create Jam</button>  
                    </div>
                </div>
        </div>
    </form>
  </main>


  <script>

  $(document).ready(function(){
    const max = 10;

let i = 1;
$('#tambah').on('click',function(e){
    e.preventDefault()
    if(i<max){
        i++
        $('.jam').append(
            `
                <label for=`+"jam"+[i]+` class="form-label ">Jam</label>
                                <input type="text" class="form-control @error('jam') is-invalid @enderror" id=`+"jam"+[i]+` name=`+"jam"+[i]+` placeholder="Enter Your Jam" required value="{{ old('jam') }}">
                                @error(`+"jam"+[i]+`)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
       
        `)
        
    }
})

$('#hapus').on('click',function(e){
    console.log('ok')
})
  })


  </script>
@endsection