@extends('layouts.main')

@section('content')
<br><br>
 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
      <div class="container">
        <div class="breadcrumb-hero">
          <h2>Blog de Noticias</h2>
          <p> Aqui encontraras las noticias y notas mas importnates en el ambito de la seguridad industruial  </p>
        </div>
      </div>
    </div>
    
  </section><!-- End Breadcrumbs -->
<br>
  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row">

        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <article class="entry">

            <div class="entry-img">
              <img src="/images/blog/1.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html">CBN celebró el Día Mundial de la Seguridad</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">Ivan Mendoza</a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-10-01">octubre 1, 2020</time></a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                La Cervecería Boliviana Nacional (CBN) año tras año celebra el Día Mundial de la Seguridad realizando una feria educativa interna dirigida a sus trabajadores para que tomen consciencia de la seguridad que deben guardar durante el desarrollo de sus funciones.
              </p>
              <div class="read-more">
                <a href="blog-single.html">Leer la nota</a>
              </div>
            </div>

          </article><!-- End blog entry -->
        </div>

        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <article class="entry">

            <div class="entry-img">
              <img src="/images/blog/2.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html">Gobernador critica a bomberos por trabajar en un carro sin SOAT</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                “No es cuestión de manejar sin SOAT (Seguro Obligatorio de Accidentes de Tránsito), ¿cómo manejan si saben que no tiene?”, dijo el gobernador de Cochabamba, Iván Canelas, al referirse al accidente que protagonizó, el lunes, un carro bombero.
              </p>
              <div class="read-more">
                <a href="blog-single.html">Leer la nota</a>
              </div>
            </div>

          </article><!-- End blog entry -->
        </div>

        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <article class="entry">

            <div class="entry-img">
              <img src="/images/blog/3.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html">Los voraces incendios que Bolivia combate hace semanas y que ya afectaron a 600.000 hectáreas</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">Melany Mendoza</a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">agsoto 1, 2020</time></a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                Los incendios forestales en Bolivia no dan tregua y ya afectaron a una superficie que es mucho mayor a la de sus ciudades más grandes como El Alto y Santa Cruz de la Sierra.
              </p>
              <div class="read-more">
                <a href="blog-single.html">Leer la nota</a>
              </div>
            </div>

          </article><!-- End blog entry -->
        </div>

        

          </article><!-- End blog entry -->
        </div>

      </div>

      <div class="blog-pagination" data-aos="fade-up">
        <ul class="justify-content-center">
          <li class="disabled"><i class="icofont-rounded-left"></i></li>
          
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
        </ul>
      </div>

    </div>
  </section><!-- End Blog Section -->

@endsection