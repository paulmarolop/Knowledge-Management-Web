<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #55aceb;">
    <div class="container">
      <a class="navbar-brand mt-1" href="/"><img src="/img/logoplg.png" width="45" class="img-thumbnail rounded-circle">BKPSDM KMS</a><div>
        <img src="img/berakhlak1.png" width="60" alt="">
    </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}"  href="/">Home</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Knowledge</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori</a>
          </li>
        </ul>

        
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-sidebar"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="post">
                @csrf 
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</a></button>
              </form>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i> Login</a>
          </li>
        </ul>
        @endauth
      </div>
        {{-- <div class="col d-flex justify-content-end">
            <img src="img/logoakhlak.png" width="100" alt="">
        </div> --}}
    </div>
    </div>
  </nav>