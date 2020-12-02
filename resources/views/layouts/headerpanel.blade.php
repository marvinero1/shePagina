<nav class="navbar navbar-expand-md bg-white shadow-sm" style="background: #94c045 !important;">
    <div class="container">
        <div>
          @if(Auth::user())
                @if(Auth::user()->role == 'root')
           <button class="openbtn" onclick="openNav()" style="background: #94c045 !important;">☰<strong>SHE</strong></button> 
            <a class="navbar-brand text-white" href="{{ url('/') }}">
            @endif
          @endif    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button> 
        </div>
        
        <div class="navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
              
                  <ul class="navbar-nav ml-auto">
                    <div id="mySidebar" class="sidebar">
                        <h5><strong>☰ SHE Consulting Group</strong></h5>
                        <a href="{{ route('index.create') }}" class="a">
                          <i class="fa fa-indent" aria-hidden="true"></i>&nbsp;
                          <span>Index</span></a>

                        <a href="{{ route('resumen.create') }}" class="a">
                          <i class="fa fa-university" aria-hidden="true"></i>&nbsp;
                          <span>Resumen</span></a>

                        <a href="{{ route('pasos.create') }}" class="a">
                          <i class="fa fa-university" aria-hidden="true"></i>&nbsp;
                          <span>Primeros Pasos</span></a>

                        <a href="{{ route('crecimiento.create') }}" class="a">
                          <i class="fa fa-university" aria-hidden="true"></i>&nbsp;
                          <span>Crecimiento Empresarial</span></a>

                        <a href="{{ route('asistenciaTecnica.create') }}" class="a">
                          <i class="fa fa-link" aria-hidden="true"></i>&nbsp;
                          <span>Asistencia Técnica</span></a>
                        
                        <a href="{{ route('CalCarga.create') }}" class="a">
                          <i class="fa fa-fire" aria-hidden="true"></i>&nbsp;
                          <span>Calculo Carga de Fuego</span></a>

                        <a href="{{ route('campoEntrenamiento.create') }}" class="a">
                          <i class="fa fa-industry" aria-hidden="true"></i>&nbsp;
                          <span>Campo Entrenamiento</span></a>
                      
                        <a href="{{ route('diagnosticoIntegrales.create') }}" class="a">
                          <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                          <span>Diagnóstico Integral</span></a>
                        
                        <a href="{{ route('PSST.create') }}" class="a">
                          <i class="fa fa-free-code-camp" aria-hidden="true"></i>&nbsp;
                          <span>PSST</span></a>

                        <a href="{{ route('MoniAmbiental.create') }}" class="a">
                          <i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;
                          <span>Monitoreo Ambiental</span></a>

                        <a href="{{ route('MoniOcupacional.create') }}" class="a">
                          <i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;
                          <span>Monitoreo Ocupacional</span></a>

                        <a href="{{ route('cursos.create') }}" class="a">
                          <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;
                          <span>Cursos</span></a>

                        <a href="{{ route('noticias.create') }}" class="a">
                          <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;
                          <span>Noticias</span></a>

                        <a href="{{ route('solucionesEspecificas.create') }}" class="a">
                          <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
                          <span>Soluciones Específicas</span></a>

                        <a href="{{ route('users.index') }}" class="a">
                          <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                          <span>Usuarios</span></a>
                          <button href="javascript:void(0)" class="openbtn" onclick="closeNav()"
                          style="background: #94c045 !important;color: white">X Cerrar</button> 
                      </div>   
                         
                  </ul>
                
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown text-white">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
            
        </div>
        
    </div>
</nav> 

  <style>   

    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color:  #94c045 !important;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 20px;
    }
    
    .sidebar a {
      padding: 2px 4px 20px 17px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: 0.5s;
    }
    
    .sidebar a:hover {
      color: #f1f1f1;
    }
    
    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }
    
    .openbtn {
      font-size: 20px;
      cursor: pointer;
      background-color: #111;
      color: white;
      padding: 10px 15px;
      border: none;
    }
    
    .a:hover {
      background-color: rgb(6, 29, 13);
    }
    .openbtn:hover {
      background-color: rgb(6, 29, 13);
    }
    
    #main {
      transition: margin-left .5s;
      padding: 16px;
    }
    
    @media screen and (max-height: 450px) {
      .sidebar {padding-top: 15px;}
      .sidebar a {font-size: 18px;}
    }
    .dropdown-container {
      display: none;
      background-color: #262626;
      padding-left: 8px;
    }

    .fa-caret-down {
      float: right;
      padding-right: 8px;
    }
    </style>
<script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "265px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
    </script>