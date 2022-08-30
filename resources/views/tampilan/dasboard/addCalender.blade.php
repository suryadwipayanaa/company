@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Tambah Jam</h4>
    </div>
    <form action="/dashboard/hari" method="POST">
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
                          @if($cate->level === "Tutor")
                          @if(old('team_id') == $cate->id)
                          <option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>
                          @else
                          <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                          @endif
                          @endif
                          @endforeach
                        </select>
                      </div>
                      

                    <div class="mb-3">
                      <label for="tanggal" class="form-label mb-3">Tanggal</label>
                      <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Enter Your tanggal" required value="{{ old('tanggal') }}">
                      @error('tanggal')
                      <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>

                    <label for="jam" class="form-label">Jam</label>
                    <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam_mulai" name="jam_mulai[]" placeholder="Enter Your Jam Mulai" required value="{{ old('jam') }}">
                    <br>
                    <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam_selesai" name="jam_selesai[]" placeholder="Enter Your Jam Selesai" required value="{{ old('jam') }}">
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
                                <input type="text" class="form-control @error('jam') is-invalid @enderror" id=`+"jam_mulai"+[i]+` name=`+"jam_mulai[]"+` placeholder="Jam Mulai" required value="{{ old('jam') }}">
                                <br>
                                <input type="text" class="form-control @error('jam') is-invalid @enderror" id=`+"jam_selesai"+[i]+` name=`+"jam_selesai[]"+` placeholder="Jam Selesai" required value="{{ old('jam') }}">
                                @error(`+"jam_mulai[]"`)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error(`+"jam_selesai[]"`)
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