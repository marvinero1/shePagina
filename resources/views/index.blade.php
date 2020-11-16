@extends('layouts.main')

@section('content')
<section id="hero">
    <div class="hero-container">
      <h1>Bienvenidos a S.H.E</h1>
      <h2> Visita nuestro nuevo campo de entrenamiento </h2>
      <a href="{{ route('campoEntrenamiento.index') }}" class="btn-get-started scrollto">Verlo Ahora</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">
              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                  <i class="icofont-simple-smile"></i>
                  <span  data-toggle="counter-up">100</span>
                  <p>Clientes Satisfechos</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                  <i class="icofont-document-folder"></i>
                  <span data-toggle="counter-up">185</span>
                  <p>Proyectos Elavorados</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                  <i class="icofont-clock-time"></i>
                  <span data-toggle="counter-up">17</span>
                  <p>Años de Experiencia</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                  <i class="icofont-award"></i>
                  <span data-toggle="counter-up">15</span>
                  <p>Reconocimiento</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline">
            <img src="/images/fondo/8.jpg" class="img-fluid" alt="">
            <a target="_blank" href="https://www.youtube.com/watch?v=wbnepcJ2hIY" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>Conoce mas de nuestros Servicios</h3>
            <p class="font-italic">
              
            S.H.E. Consulting Group S.R.L. consultora especializada en
            Gestión Salud, Seguridad Ocupacional y Gestión Medio Ambiental
            remonta su historia a 2003 como una consultora unipersonal ante
            la necesidad de gestionar en la sociedad puestos de trabajo más
            seguro y equilibrados entre industria y medio ambiente.)
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Trabajo de calidad bajo normas nacionales e internacionales.</li>
              <li><i class="bx bx-check-double"></i> Equipos certificados</li>
              <li><i class="bx bx-check-double"></i> Personal Capacitado y con amplia experiencia</li>
              <li><i class="bx bx-check-double"></i> Trabajos a nivel nacional</li>
            </ul>
            <p>
              Durante su creciente desarrollo impulsado por el paulatino
              desarrollo y demanda de nuestro mercado y la captación de grandes
              proyectos además de los requerimientos generados por nuestros
              clientes, nace la necesidad de cambiar de unipersonal a una
              organización S.R.L. 
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">
        <div class="text-center">
          <h3>Capacitaciones </h3>
          <p> Contamos con una gran variedad de cursos y Capacitaciones pensadas para empresas e industria en general. </p>
          <a class="cta-btn" target="_blank" href="{{ route('cursos.index') }}">Nuestros cursos</a>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Services Section ======= -->
    <!-- https://icons8.com/line-awesome   para mas iconos aqui-->
    <section id="services" class="services  section-bg ">
      <div class="container">

        <div class="section-title pt-5">
          <h2>Nuestros servicios</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box" >
              <div class="icon"><i class="las la-tree" style="color: #3bce36;"></i></div>
              <h4 class="title"><a target="_blank"  href="{{ route('MoniAmbiental.index') }}">Monitoreos Ambientales</a></h4>
              <p class="description"> Se realiza a efectos de medir la presencia y concentración de contaminantes en el ambiente, así como el estado de conservación de los recursos naturales</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="icon-box" >
              <div class="icon"><i class="las la-industry" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a target="_blank"  href="{{ route('MoniOcupacional.index') }}">Monitores Ocupacionales</a></h4>
              <p class="description">Nos permite reconocer, evaluar y controlar los factores de riesgo ocupacional generados en el lugar de trabajo con el fin de prevenir las enfermedades profesionales</p>
            </div>
          </div>

          <div class="col-md-6" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="las la-tools" style="color: #3fcdc7;"></i></div> 
              <h4 class="title"><a target="_blank"  href="{{ route('asistenciaTecnica.index') }}">Asistencia Tecnica</a></h4>
              <p class="description">Realizamos el servicio de asesoramiento y asistencia en temas de seguridad y medio ambiente</p>
            </div>
          </div>
          <div class="col-md-6" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="las la-folder-open" style="color:#41cf2e;"></i></div> 
              <h4 class="title"><a target="_blank"  href="{{ route('PSST.index') }}">Elaboracion de programas PSST</a></h4>
              <p class="description">El Programa de Seguridad y Salud en el Trabajo se constituye en el documento que regirá de forma interna en cada Empresa</p>
            </div>
          </div>

          <div class="col-md-6" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="las la-globe-americas" style="color: #eeff00;"></i></div>
              <h4 class="title"><a target="_blank"  href="{{ route('diagnosticoIntegrales.index') }}">Diagnosticos Integrales</a></h4>
              <p class="description">Permite vislumbrar áreas de oportunidad y de mejora tanto organizacionales, analizando las diferentes áreas que conforman la empresa para definir su óptima estructura de funcionamiento.</p>
            </div>
          </div>
          <div class="col-md-6"  data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="las la-calculator" style="color: #4680ff;"></i></div>
              <h4 class="title"><a target="_blank"  href="{{ route('CalCarga.index') }}">Calculo de carga de Fuego</a></h4>
              <p class="description">El objetivo de realizar un estudio de carga de fuego, es el de determinar la cantidad total de calor capaz de desarrollar la combustión completa de todos los materiales contenidos en un sector de incendio.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->
  <!-- End Footer -->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@endsection