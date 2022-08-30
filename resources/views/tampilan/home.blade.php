@extends('layout.layout')

@section('header')
<div class="home">
    <div class="benner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6 kiri">
                    <strong><i>Let's Join us <i class="bi bi-book-fill"></i></i></strong>
                    <h1>Jolly Roger <span>Education</span></h1>
                    <p>Lorem ipsum dolor, sit amet Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde libero accusamus reiciendis, doloribus aliquid itaque consequuntur assumenda, molestias officiis incidunt necessitatibus ut cum cupiditate enim delectus ea, possimus quasi! Repellat. consectetur adipisicing elit. Quos et hic vitae quaerat, blanditiis consequatur laboriosam voluptatibus ratione reiciendis enim!</p>
                    <a href="/blogs" class="more">Learn More</a>
                </div>
                <div class="col-sm-12 col-md-6 kanan">
                    <img src="{{ url('/images/learn.jpg') }}" style="width:100%">
                </div>
            </div> 
        </div>   
    </div>
    <div class="promo">
        <div class="promoTitle text-center">
            <p>Promo <span>Course</span></p>
            <h3>Good <span>New's</span> For Everyone</h3>
        </div>
        <div class="row">
            @if($promo->count())
            @foreach($promo as $p)
            <div class="col-sm-12 col-md-4 mt-3">
                <div class="card">
                    <div class="diskon">
                        <strong>{{ $p->diskon }}% Off</strong>
                    </div>
                    <img src="{{ asset('storage/'.$p->image) }}" class="card-img-top" alt="..." style="width:100%">
                    <div class="card-body">
                      <h5 class="card-title">{{ $p->title }}</h5>
                      <p class="card-text">{!! $p->deskripsi !!}</p>
                      <div class="price">
                        <span class="awal">Rp. {{ $p->hargaAwal }}</span>
                        <span class="akhir">Rp. {{ $p->hargaAkhir }}</span>
                      </div>
                      <a href="/detailPromo/{{ $p->slug }}" class="btn detail"><i class="bi bi-eye-fill"></i> Detail Course</a>
                      <button class="btn buy" id="pay-button"><i class="bi bi-credit-card-fill"></i> Buy It</button>
                    </div>
                 </div>
            </div>
            @endforeach

            @else
            <div class="text-center">
                <h5  style="color:#fff ; background-color:red; padding:5px; border-radius:5px; width:fit-content; margin: 20px auto;">Belum Ada Promo Saat Ini</h5>
            </div>
                
            @endif
        </div>
    </div>
    <div class="about">
        <div class="aboutTitle text-center mb-5">
            <p><span>About</span> Jolly Roger</p>
            <h3>SPECIAL <span>THINGS</span> OF US</h3>
        </div>
        <div class="row align-items-center mb-5">
            <div class="col-md-6 col-sm-12">
                <img src="{{ url('/images/jr.jpg') }}" style="width: 100%">
            </div>
            <div class="col-md-6 col-sm-12">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ab itaque, natus officia in at facilis voluptatum ipsam, rerum a cum possimus alias atque similique animi eum saepe quos explicabo perspiciatis eveniet repudiandae libero maiores, perferendis ex! Quis corporis odit fuga dolores sit perspiciatis numquam earum aperiam, sequi quibusdam non vitae cupiditate ad accusantium dolorem atque illum recusandae delectus architecto quod, amet aliquam vero sed. Consectetur hic saepe quibusdam molestiae error similique porro aut iste voluptate iure ullam, natus deleniti architecto ut odio adipisci, a cumque explicabo iusto! Modi provident quaerat libero officia voluptate nemo culpa iusto sequi, quidem quam!
            </p>
            <a href="/blogs" class="more">Read More</a>
            </div>
        </div>
        <div class="part">
            <div class="aboutTitle text-center">
                <h3>Apart <span>Of</span> Jolly<span> Roger</span></h3>
            </div>
            <div class="row justify-content-center">
                @foreach($branch as $b)
                <div class="col-sm-12 col-md-4 mt-3">
                    <div class="card">
                        <img src="{{ asset('storage/' .$b->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $b->name }}</h5>
                          <p>{!! $b->deskripsi !!}</p>
                          <p class="card-text">
                            <a href="{{ $b->maps }}">
                                <i class="bi bi-geo-alt-fill"></i> {{ $b->alamat }}
                            </a>
                        </p>
                          <p class="card-text">
                            <i class="bi bi-telephone-outbound-fill"></i> {{ $b->telp }}
                        </p>
                          <p class="card-text">
                            <a href="https://wa.me/{{ $b->whattsapp }}">
                                <i class="bi bi-whatsapp"></i> {{ $b->whattsapp }}
                            </a>
                            </p>
                          <p class="card-text">
                            <a href="https://instagram.com/{{ $b->instagram }}?igshid=YmMyMTA2M2Y=">
                                <i class="bi bi-instagram"></i> {{ $b->instagram }}
                            </a>
                            </p>
                          <p class="card-text">
                            <a href="mailto:{{ $b->email }}">
                                <i class="bi bi-envelope-fill"></i> {{ $b->email }}
                            </a>
                        </p>
                          <a href="{{ $b->maps }}" class="btn map"><i class="bi bi-geo-alt-fill"></i> See On Map</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="course">
        <div class="courseTitle text-center">
            <p>Our <span>Course</span></p>
            <h3>The <span>Best</span> Course Ever</h3>
        </div>
        <div class="row justify-content-center">
            @foreach($course as $c)
            <div class="col-sm-12 col-md-4 mt-3">
                <div class="card">
                    <img src="{{ asset('storage/'.$c->image) }}" class="card-img-top" alt="..." style="width:100%">
                    <div class="card-body">
                      <h5 class="card-title">{{ $c->title }}</h5>
                      <p class="card-text">{!! $c->deskripsi !!}</p>
                      <div class="price">
                        <span class="akhir">Rp. {{ $c->harga }}</span>
                      </div>
                      <a href="/detailcourse/{{ $c->slug }}" class="btn detail"><i class="bi bi-eye-fill"></i> Detail Course</a>         
                      <a href="/verify" class="btn buy" id="pay-button" style="cursor: pointer"><i class="bi bi-credit-card-fill"></i> Buy It</a>          
                    </div>
                 </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="tutor">
        <div class="tutorTitle text-center mb-5">
            <p><span>Team </span>At Jolly Roger Gianyar</p>
            <h3>The Best <span>Team</span> Ever</h3>
        </div>
        <div class="row">
            @foreach($teams as $team)
            <div class="col-sm-12 col-md-4 mt-3">
                <div class="card">
                    <img src="{{ asset('storage/' .$team->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="image-tutor" style="width:130px; height:130px; border-radius:50%" >
                            <img src="{{ asset('storage/' .$team->teamImage) }}" style="width: 100%; height:100%; border-radius:50%">
                        </div>
                      <h5 class="card-title text-center" style="margin-top: 60px">{{ $team->name }}</h5>
                      <strong class="card-title text-center d-block">{{ $team->level }} At Jolly Roger Gianyar</strong>
                      <p class="card-text text-center">{!! $team->deskripsi !!}</p>
                      <strong class="card-title d-block">Joined Since {{ $team->join }}</strong>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="say">
        <div class="container">
        <div class="sayTitle text-center mb-3">
            <p><span>Student </span>Said</p>
            <h3>Why Choose <span>Us?</span></h3>
        </div>
        <div class="row">
            @foreach($say as $s)
            <div class="col-sm-12 col-md-4 mt-3">
                <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset('storage/' .$s->image) }}" class="img-fluid rounded-start" alt="..." style="height:100%; object-fit:cover">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <div class="petik">
                                <i class="bi bi-quote"></i>
                            </div>
                          <h5 class="card-title">{{ $s->name }}</h5>
                          <strong class="card-title">Student Of Jolly Roger</strong>
                          <p class="card-text">{!! $s->deskripsi !!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    <div class="komentar" id="komentar">
      <div class="container">
        <div class="komentarTitle">
            <h2>Leave Your <span>Comment</span></h2>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 mt-3">
                <div class="here">
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Login First</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Silahkan Login Dulu!
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a class="nav-link active login" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                            </div>
                          </div>
                        </div>
                      </div>
                   <form action="/dashboard/komentar" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="jollyroger@gmail.com" name="email"
                        @if(auth()->user())
                        value="{{ auth()->user()->email }}"
                        @else
                        value=""
                        @endif
                        required>
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="floatingname" placeholder="name" id="name" name="name"
                        @if(auth()->user())
                        value="{{ auth()->user()->name }}"
                        @else
                        value=""
                        @endif
                         required>
                        <label for="floatingname">Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <textarea class="form-control" style="height: 70px" placeholder="Leave a comment here" id="floatingTextarea" name="komentar" required></textarea>
                        <label for="floatingTextarea">Comments</label>
                      </div>
                      @if(auth()->user())
                      <button type="submit" class="more">Submit</button>
                      @else
                      <p class="more" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer">Submit</p>
                      @endif
                </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mt-3">
                    <img src="{{ url('/images/jr.jpg') }}" width="100%">
            </div>
        </div>
        @if($komentar->count())
        <div class="result mt-5">
            <div class="row">
          @foreach($komentar as $k)
          <div class="col-sm-12 col-md-8" style="position: relative">
              <div class="petik">
                  <i class="bi bi-quote"></i>
              </div>
              <img src="{{ url('/images/user.jpg') }}" width="30%" style="float: left; display:block; margin-right:10px">
              <strong class="email">{{ $k->name }}</strong>
              <strong  class="name" style="display: block">{{ $k->email }}</strong>
              <p style="text-align: justify">{{ $k->komentar }}</p>
              <p class="card-text"><small class="text-muted">Last updated {{ $k->created_at->diffForHumans() }}</small></p>
          </div>
          <hr>
          @endforeach
          @else
          <p class="bg-danger py-2 px-3 text-center" style="color: #fff; border-radius:7px; width:fit-content; margin:40px auto;">Komentar Not Yet</p>
            
          @endif
            </div>
        </div>
    </div>
 </div>
</div>

<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('$payment');
    // customer will be redirected after completing payment pop-up
  });
</script>
@endsection

