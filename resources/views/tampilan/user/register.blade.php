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
        <h3>Register <span>Area</span></h3>
        <form action="/register" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="jollyroger" name="name" required value="{{ old('name') }}" required>
                <label for="name"> <i class="bi bi-person-fill"></i> Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="jollyroger" name="username" required value="{{ old('username') }}" required>
                <label for="username"> <i class="bi bi-person-fill"></i>  Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="jollyroger" name="email" required value="{{ old('email') }}" required>
                <label for="email"> <i class="bi bi-envelope-fill"></i>  Email Address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                <label for="password"><i class="bi bi-key-fill"></i> Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <button type="submit" class="btn-login">Register</button>
        </form>
          <p class="text-center">have any account? <i><a href="/login" style="text-decoration: none">Login</a>
    </div>
   </div>

<!-- JavaScript Bundle with Popper -->
<script src="{{ url('/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>