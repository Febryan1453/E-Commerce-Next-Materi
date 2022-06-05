<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-nav">
      <div class="container">
          <a href="{{asset('/')}}"><img class="brand" src="{{asset('front/icon/idn.png')}}">  </a>                                 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">            
            <li class="nav-item">
              <a class="nav-link" href="{{route('semua')}}">Semua Produk</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($kategori as $kat)
                  <li><a class="dropdown-item" href="{{route('landing.kategori',$kat->slug)}}">{{$kat->nama_kategori}}</a></li>
                @endforeach                
              </ul>
            </li>
          </ul>

          <div class="d-flex">
          @guest
             <a class="nav-link anchor me-3" href="{{route('mencari')}}" role="button">
                    <i class="fas fa-search"></i> Cari
                    </a>
              <!-- <a href="{{route('login')}}" class="me-3 btn btn-outline-light border-none">Login</a>                        -->
              <a href="{{ route('register') }}" style="padding-left: 1.75rem; padding-right: 1.75rem;" class="btn btn-outline-light">Masuk</a>
          @else
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('mencari')}}" role="button">
                    <i class="fas fa-search"></i> Cari
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('landing.keranjang')}}" role="button">
                      <i class="fas fa-shopping-bag"></i> Keranjang
                      @if($jumlah !== 0)                     
                      <span class="badge badge-danger" style="background-color: red;">{{$jumlah}}</span>                      
                      @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('landing.history')}}" role="button">
                    <i class="fas fa-history"></i> History
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                      @if(Auth::user()->role == 'Admin' )
                      <li><a class="dropdown-item" href="{{route('profile.index')}}">Dashboard {{ Auth::user()->name }}</a></li>
                        <li><a class="dropdown-item" href="{{route('profile.show', Auth::user()->username)}}">Lihat Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('produk.create')}}">Tambah Produk</a></li>
                        <li><a class="dropdown-item" href="{{route('kategori.index')}}">Tambah Kategori</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                          {{ __('Keluar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                            </form>
                        </li>
                      @else
                        <li><a class="dropdown-item" href="{{route('profile.show', Auth::user()->username)}}">Lihat Profile</a></li>
                          <li><a class="dropdown-item" href="{{route('profile.edit', Auth::user()->username)}}">Edit Profile</a></li>
                          <li><a class="dropdown-item" href="{{route('ganti')}}">Ganti Password</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                            {{ __('Keluar') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                              </form>
                          </li>
                      @endif

                    </ul>
                </li>
              </ul>
          @endguest
          </div>

        </div>

      </div>
    </nav> 