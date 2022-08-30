<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" id="header">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-3 text-center" href="/dashboard">Jolly <span>Roger</span></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <li class="nav-item dropdown" style="list-style: none; color:#fff; margin-right:140px">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ url('/images/user.jpg') }}" style="width: 40px; border-radius:50%; height:40px">
        </a>
        <ul class="dropdown-menu">
          <li class="dropdown-item" style="font-size: 0.8em"><span data-feather="user" class="align-text-bottom"></span> {{ auth()->user()->name }}</li>
          <li class="dropdown-item" style="font-size: 0.8em"><span data-feather="award" class="align-text-bottom"></span> Admin</li>
          <li class="dropdown-item" style="font-size: 0.8em"><a href="#" style="text-decoration: none; color:#000"><span data-feather="settings" class="align-text-bottom"></span> Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form method="POST" action="/logout">
              @csrf
              <button type="submit" name="logout" class="nav-link px-3 dropdown-item btn-logout"> Logout  <span data-feather="log-out"></span></button>
            </form>
          </li>
        </ul>
      </li>
  </header>