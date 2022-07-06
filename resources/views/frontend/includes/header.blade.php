<header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">
                <img src="{{asset('img/logo.png')}}" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Services</a>
                    </li>
                </ul>
                @auth
                <div class="authBtnDiv">
                    <div class="dropdown">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        {{Auth::user()->email}}
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="menu-link px-5" href="{{url('profile')}}">Profile</a></li>
                        <li><a class="menu-link px-5" href="{{'myorders'}}">Orders</a></li>
                        <li>
                            <a class="menu-link px-5" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        
                      </ul>
                    </div>
                </div>
                @endauth
                @guest
                <div class="authBtnDiv">
                    <a href="{{url('register')}}" class="login__Register-Btn">Login / Register</a>
                </div>
                @endguest
            </div>
        </nav>
    </header>