<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     
    <link rel="stylesheet" href='{{ url('/css/login.css') }}' >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<body>

   <div class="container">
    <div class="login">
        <div class="icons">
            <i class="bi bi-lock-fill"></i>
        </div>
        <h3>Login <span>Area</span></h3>
        @if(session()->has('sucess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('sucess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
          <form method="POST" action="/login">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="jollyroger" name="username" autofocus required value="{{ old('username') }}">
                <label for="floatingInput"> <i class="bi bi-person-fill"></i> Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword"><i class="bi bi-key-fill"></i> Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button type="submit" class="btn-login">Sign In</button>
              <span class="or" style="text-align: center; display:block">OR</span>
              <a href="/auth/facebook" class="btn-facebook"><i class="bi bi-facebook"></i> Sign in using Facebook</a>
              <a href="/auth/google" class="btn-google"><i class="bi bi-google"></i> Sign in using Google</a>
        </form>
          <p class="text-center">Dont have any account? <i><a href="/register" style="text-decoration: none">Register</a>
    </div>
   </div>

<!-- JavaScript Bundle with Popper -->
<script src="{{ url('/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>