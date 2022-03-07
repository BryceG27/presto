<div class="container">
    <div style="height: 25px"></div>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom border-top">
        <a href="/" class="navbar-brand d-flex text-center align-items-center col-md-3 mb-2 mb-md-0 ps-md-5 ps-auto text-dark text-decoration-none">
            <i class="bi bi-front fs-4 pe-1"></i> Presto
        </a>
        
        <ul class="nav col-12 col-md-auto ms-5 mb-2 justify-content-center mb-md-0">
            
            <li><a href="{{route('home')}}" class="nav-link px-2 link-dark">Home</a></li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle px-2 link-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach ($categories as $category)
                    <a class="text-decoration-none text-dark ms-2" href="{{route('announcement.category',[
                    $category->name,
                    $category->id
                    ])}} ">
                    {{$category->name}}
                </a>
                <br>
                @endforeach
            </div>
        </li> 
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark text-decoration-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="text-uppercase"><i class="bi bi-globe pe-2"></i> <strong>{{App::currentLocale()}}</strong></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if ((App::isLocale('it')) == (App::currentLocale()))
                
                @else    
                <li class="nav-item d-flex">
                    @include ('components.locale' , ['lang' => 'it' , 'nation' => 'it'])
                </li>
                @endif
                @if ((App::isLocale('en')) == (App::currentLocale()))
                
                @else
                <li class="nav-item d-flex">
                    @include ('components.locale' , ['lang' => 'en' , 'nation' => 'gb'])
                </li>
                @endif
                @if ((App::isLocale('es')) == (App::currentLocale()))
                
                @else
                <li class="nav-item d-flex">
                    @include ('components.locale' , ['lang' => 'es' , 'nation' => 'es'])
                </li>
                @endif
            </ul>
        </li>
    </ul>
    
    <div class="col-md-4 text-end">
        @guest
        <a class="me-2" aria-current="page" href="{{route('login')}}">Login</a>
        <a class="me-2" aria-current="page" href="{{route('register')}}">Registrati</a>
        @endguest
        @auth
        <a class="nav-link dropdown-toggle" href="#" id="dropdownLogout" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="text-dark">Ciao </span>{{Auth::user()->name}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownLogout">
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(), document.getElementById('logout').submit()">Logout</a></li>
            <form method="POST" action="{{route('logout')}}" id="logout">
                @csrf
            </form>
        </ul>
        @endauth
    </div>
</div>
</header>
<div class="border-bottom pb-3 bg-light container">
    <div class="row row-cols-md-3 row-cols-2">
        <div class="col-4">
            <form method="GET" action="{{route("search")}}" class="d-flex col-12 col-lg-9 mb-2 mb-lg-0 me-lg-auto">
                @csrf 
                <div class="input-group">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search" name="q">
                </div>
            </form>
        </div>
        <div class="col-4">
            @auth
            @if(Auth::user()->is_revisor)
            <div class="text-center">
                <a href="{{route('revisor.home')}}" class="nav-link px-2 link-dark">Revisor<i class="bi bi-house ps-2"></i>
                    @if (\App\Models\Announcement::ToBeRevisionedCount() == 0)
                    <span class="badge rounded-pill bg-success">{{\App\Models\Announcement::ToBeRevisionedCount()}}</span>
                    @else
                    <span class="badge rounded-pill bg-danger">{{\App\Models\Announcement::ToBeRevisionedCount()}}</span>                    
                    @endif
                </a>
            </div>
            @endif
            @endauth
        </div>
        <div class="col-4 text-end mt-2">
            <a class="btn btn-outline-danger" href="{{route('fast')}}"><i class="bi bi-plus-square"></i> Crea annuncio</a>
        </div>
    </div>
</div>
</div>
</div>
