<nav class="navbar navbar-expand-lg bg-light bg-transparent" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="/"><i class="bi bi-pen-fill"></i> Jolly <Span>Roger</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home')? 'active' : '' }}" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Course')? 'active' : '' }}" href="/course">Course</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Contact')? 'active' : '' }}" href="/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Blogs')? 'active' : '' }}" href="/blogs">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Category')? 'active' : '' }}" href="/category">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <form method="POST" action="/logout">
                @csrf
                <button type="submit" name="logout" class="dropdown-item btn-logout"><i class="bi bi-box-arrow-left"></i> Logout</button>
              </form>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link active login" aria-current="page" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

