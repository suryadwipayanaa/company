<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard')? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/category*')? 'active' : '' }}" href="/dashboard/category">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/blogs*')? 'active' : '' }}" href="/dashboard/blogs">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Blogs
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/promo*')? 'active' : '' }}" href="/dashboard/promo">
            <span data-feather="scissors" class="align-text-bottom"></span>
            Promo
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/branch*')? 'active' : '' }}" href="/dashboard/branch">
            <span data-feather="home" class="align-text-bottom"></span>
            Our Branch
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/course*')? 'active' : '' }}" href="/dashboard/course">
            <span data-feather="book-open" class="align-text-bottom"></span>
            Course
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/teams*')? 'active' : '' }}" href="/dashboard/teams">
            <span data-feather="users" class="align-text-bottom"></span>
            Our Team
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/say*')? 'active' : '' }}" href="/dashboard/say">
            <span data-feather="users" class="align-text-bottom"></span>
            People Said
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/komentar*')? 'active' : '' }}" href="/dashboard/komentar">
            <span data-feather="edit-2" class="align-text-bottom"></span>
            Komentar
          </a>
        </li>
      </ul>
    </div>
  </nav>
