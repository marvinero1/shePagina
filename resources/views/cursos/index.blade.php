@extends('layouts.main')

@section('content')
<br><br><br><br>

  <section id="features" class="features">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Nuestros Cursos y Capacitaciones Empresariales</h2>
        <p>En este catalogo pueden observar nuestros diferentes cursos y capacitaciones  </p>
      </div>

      <div class="row">
        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <div class="card" style="background-image: url(/images/cursos/2.png);">
            <div class="card-body">
              <h5 class="card-title"><a href="cursos.html">Curso de primeros auxlios</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
              <div class="read-more"><a href="cursos.html"><i class="icofont-arrow-right"></i> Read More</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up">
          <div class="card" style="background-image: url(/images/cursos/3.png);">
            <div class="card-body">
              <h5 class="card-title"><a href="cursos.html">Manejo defencivo </a></h5>
              <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem.</p>
              <div class="read-more"><a href="cursos.html"><i class="icofont-arrow-right"></i> Read More</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Features Section -->
@endsection