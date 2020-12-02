<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex">
        <div class="logo mr-auto">
            <!--   <h1 class="text-light"><a href="index.html">SHE Consulting Group</a> </h1> -->

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/"><img src="/images/logom.png" alt="logo" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="drop-down"><a href="#">Nosotros</a>
                    <ul>
                        <li><a href="/historia">Historia</a></li>
                        <li><a href="/mision">Mision Vision </a></li>                  
                </li>
            </ul>
            </li>

            <li class="drop-down"><a href="#">Servicios</a>
                <ul>
                    <li><a href="{{ route('asistenciaTecnica.index') }}">Asistencia Tecnica</a></li>
                    <li><a href="{{ route('CalCarga.index') }}">Calculo Carga de Fuego</a></li>
                    <li><a href="{{ route('diagnosticoIntegrales.index') }}">Diagnosticos Integrales</a></li>
                    <li><a href="{{ route('PSST.index') }}">Elaboracion de programas PSST</a></li>
                    <li><a href="{{ route('MoniAmbiental.index') }}">Monitoreos Ambientales</a></li>
                    <li><a href="{{ route('MoniOcupacional.index') }}">Monitoreos Ocupacionales</a></li>
                    <li><a href="{{ route('solucionesEspecificas.index') }}">Soluciones Especificas</a></li>
                </ul>
            </li>
            <li class="get-started"><a href="{{ route('campoEntrenamiento.index') }}">Campo De Entrenamiento</a></li>
            <li><a href="{{ route('cursos.index') }}">Cursos</a></li>
            <li><a href="{{ route('noticias.index') }}">Noticias</a></li>
            <li><a href="{{ route('contactanos.index') }}">Contactos</a></li>
            </ul>
        </nav>
    </div>
</header>