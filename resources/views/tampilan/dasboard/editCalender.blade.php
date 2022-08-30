@extends('layout.dashboard.dasboard')
    
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h4><span data-feather="plus"></span> Edit Day</h4>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/hari/{{ $hari->id }}">
              @method('put')
                @csrf
                <div class="mb-3">
                  <label for="hari" class="form-label">Hari</label>
                  <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" placeholder="Enter Your hari" value="{{ old('hari',$hari->hari) }}" id="hari" required>
                    @error('hari')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>

                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Enter Your tanggal" value="{{ old('tanggal',$hari->tanggal) }}" id="tanggal" required>
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>

                @if($hari->jam)
                <div class="mb-3">
                  <label for="jam" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" placeholder="Enter Your jam" value="{{ old('jam',$hari->jam) }}" id="jam">
                    @error('jam')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif
                
                @if($hari->jam2)
                <div class="mb-3">
                  <label for="jam2" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam2') is-invalid @enderror" id="jam2" name="jam2" placeholder="Enter Your jam" value="{{ old('jam2',$hari->jam2) }}" id="jam2">
                    @error('jam2')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif
                
                @if($hari->jam3)
                <div class="mb-3">
                  <label for="jam3" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam3') is-invalid @enderror" id="jam3" name="jam3" placeholder="Enter Your jam" value="{{ old('jam3',$hari->jam3) }}" id="jam3">
                    @error('jam3')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif

                @if($hari->jam4)
                <div class="mb-3">
                  <label for="jam4" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam4') is-invalid @enderror" id="jam4" name="jam4" placeholder="Enter Your jam" value="{{ old('jam4',$hari->jam4) }}" id="jam4">
                    @error('jam4')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif

                @if($hari->jam5)
                <div class="mb-3">
                  <label for="jam5" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam5') is-invalid @enderror" id="jam5" name="jam5" placeholder="Enter Your jam" value="{{ old('jam5',$hari->jam5) }}" id="jam5" >
                    @error('jam5')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif
                
                @if($hari->jam6)
                <div class="mb-3">
                  <label for="jam6" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam6') is-invalid @enderror" id="jam6" name="jam6" placeholder="Enter Your jam" value="{{ old('jam6',$hari->jam6) }}" id="jam6">
                    @error('jam6')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif
                
                @if($hari->jam7)
                <div class="mb-3">
                  <label for="jam7" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam7') is-invalid @enderror" id="jam7" name="jam7" placeholder="Enter Your jam" value="{{ old('jam7',$hari->jam7) }}" id="jam7">
                    @error('jam7')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif
                
                @if($hari->jam8)
                <div class="mb-3">
                  <label for="jam8" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam8') is-invalid @enderror" id="jam8" name="jam8" placeholder="Enter Your jam" value="{{ old('jam8',$hari->jam8) }}" id="jam8" >
                    @error('jam8')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif
                
                @if($hari->jam9)
                <div class="mb-3">
                  <label for="jam9" class="form-label">Jam</label>
                  <input type="text" class="form-control @error('jam9') is-invalid @enderror" id="jam9" name="jam9" placeholder="Enter Your jam" value="{{ old('jam9',$hari->jam9) }}" id="jam9">
                    @error('jam9')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                @endif

                <button type="submit" name="submit" class="btn btn-primary mb-5">Create</button>
              </form>
        </div>
    </div>

  </main>
@endsection