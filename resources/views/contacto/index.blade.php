@extends('layouts.main')

@section('content')
<br><br>
 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
      <div class="container">
        <div class="breadcrumb-hero">
          <h2>Contact</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit eligendi veniam vero beatae harum tenetur similique ullam voluptatibus, quidem doloribus adipisci iusto aspernatur odit nemo praesentium quaerat ex ad vitae.
             </p>
        </div>
      </div>
    </div><br><br>
  </section><!-- End Breadcrumbs -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1132.0796523864178!2d-66.18178528231223!3d-17.37109921150547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e375495608c515%3A0x3b545d81d63b50b7!2sESCUELA%20DE%20CONDUCTORES%20S.H.E.!5e0!3m2!1ses-419!2sbo!4v1598617066926!5m2!1ses-419!2sbo" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  
      </div>
      <div class="row mt-5">

        <div class="col-lg-4" data-aos="fade-right">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Ubicacion</h4>
              <p>Av America  </p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>info@shebolivia.net</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>+591 4486011</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Cargando</div>
              <div class="error-message"></div>
              <div class="sent-message">Su mensaje a sido enviado Gracias</div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
          </form>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->
@endsection