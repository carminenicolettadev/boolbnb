@section('menu')
  <div class="menu">
    @if (Route::has('login'))
        <div class="nav">
            @auth
              <div class="menu-links">
                {{-- link menu nella home se sei loggato  --}}
                  <a href="{{ url('/') }}">Home</a>
                  <a href="{{ url('/') }}">Flat</a>
                  <a href="{{ route('profile', Auth::user()->id ) }}">Profile</a>

                  {{-- logout button --}}
                  {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a> --}}

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                    {{-- fine logout button --}}
                  {{-- fine link menu nella home se sei loggato  --}}
              </div>
            @else


                <div class="menu-links">
                  {{-- link menu nella home se NON sei loggato  --}}
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/') }}">Flat</a>
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>

                    {{-- fine link menu nella home se NON sei loggato  --}}
                </div>
            @endauth
        </div>
    @endif
  </div>
@endsection
