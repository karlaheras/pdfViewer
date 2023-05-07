<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}"> 
                <img src="{{asset("imgs/logo.png")}}" width="50px" height="50px"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">                            
                 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Inicio
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('usuario/registrar/')}}">Registrar usuario</a></li>
                            <li class="dropdown-item">
                                <form method="post" action="{{url('logout')}}" id="logout"> @csrf </form>
                                <div class="active" aria-current="page" onclick="document.getElementById('logout').submit();">Cerrar Sesion</
                                
                                </div>
                            </li>
                        </ul>
                      </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('login')}}">Iniciar Sesion</a>
                        </li>    
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>