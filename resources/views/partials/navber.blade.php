

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-3">
    <button class="btn btn-sm btn-outline-dark" id="menu-toggle"><i class="fas fa-utensils"></i> Menu</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search order" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <strong>
            {{ Session::get('name') }}
           </strong>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('profile/'.Session::get('username')) }}">Profile</a>
            <a class="dropdown-item" href="/">Setting</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>