@extends('layouts.main')

@section('content')
<br><br><br>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
      <div class="container">
        <div class="breadcrumb-hero">
          <h2>Creacion</h2>
          <p> La empresa she consulting group nace ya hace mas de 15 años como una pequeña empresa unipersonal, la  cual se planteba de tener mejoras en los sistemas de seduridad integral.</p>
        </div>
      </div>
    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">   
      <br>
      @foreach($resumen as $instructoritem)
        <div class="row">
          <div class="col-lg-6 video-box align-self-baseline">
            <img src="{{ $instructoritem->imagen }}" class="img-fluid" alt="imagenResumen" width="100%">
            <a href="{{ $instructoritem->video_url }}" target="_blank" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
          <div class="col-lg-6 pt-3 pt-lg-0 content">        
            <h3>{{ $instructoritem->titulo }}</h3>
            
            <p>{{ $instructoritem->descripcion }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </section><!-- End About Section -->

  <!-- ======= Work Process Section ======= -->
  <section id="work-process" class="work-process">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Primeros pasos</h2>
        <p> Nuestros primeros en el mercado marcaron el rumbo que tomaria la empresa brindado un sevicio espercializado, y dejando de lado el sericio en general, enfocandonos en temas poco vistos en bolivia.</p>
      </div>
      @foreach($paso as $instructoritem)
        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="{{ $instructoritem->imagen }}" class="img-fluid" alt="imgPrimerosPasos" width="100%">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3></h3>
            <p class="font-italic"><strong>{{ $instructoritem->titulo }}</strong></p>
            <ul>
              <li><i class="icofont-check"></i> {{ $instructoritem->texto1 }}</li>
              <li><i class="icofont-check"></i> {{ $instructoritem->texto2 }}</li>
              <li><i class="icofont-check"></i> {{ $instructoritem->texto3 }}</li>

              <p>{{ $instructoritem->descripcion }}</p> 
            </ul>
          </div>
        </div>
      @endforeach
  </section><!-- End Work Process Section -->

  <!-- ======= Our Skills Section ======= -->
  <section id="skills" class="skills section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Cremimiento Empresarial</h2>
      </div>
      @foreach($crecimiento as $instructoritem)
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="{{ $instructoritem->imagen }}" class="img-fluid" alt="imagenCrecimiento" width="100%">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
              <p class="font-italic"><strong>{{ $instructoritem->titulo }}</strong></p><br>
              
              <ul>
              <li><i class="icofont-check"></i> {{ $instructoritem->texto1 }}</li>
              <li><i class="icofont-check"></i> {{ $instructoritem->texto2 }}</li>
              <li><i class="icofont-check"></i> {{ $instructoritem->texto3 }}</li>
              </ul>
              <p>{{ $instructoritem->descripcion }}</p> 
          </div>
        </div>
      @endforeach
    </div>
  </section><!-- End Our Skills Section -->

 <!-- ======= Our Clients Section ======= -->
 <section id="clients" class="clients">
    <div class="container">
        <div class="section-title">
            <h2>Nuestros Clientes</h2>
            <p>Un agradecimeito especial a Nuestros clientes </p>
        </div>
        <div style="text-align: center;">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/clients/client-1.png" alt="" class="img1">
                </div>
                <div class="col-md-4">
                    <img src="/images/clients/client-2.png" alt="" class="img1">
                </div>
                <div class="col-md-4">
                    <img src="/images/clients/client-3.png" alt="" class="img1">
                </div>
            </div><br><br><br>
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/clients/client-4.png" alt="" class="img1">
                </div>
                <div class="col-md-4">
                    <img src="/images/clients/client-5.png" alt="" class="img1">
                </div>
                <div class="col-md-4">
                    <img src="/images/clients/client-6.png" alt="" class="img1">
                </div>
            </div><br><br><br>
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/clients/client-7.png" alt="" class="img1">
                </div>
                <div class="col-md-4">
                    <img src="/images/clients/client-8.png" alt="" class="img1">
                </div>
                <div class="col-md-4">
                    <img src="/images/clients/client-9.png" alt="" class="img1">
                </div>
            </div>
        </div>

    </div>
</section><!-- End Our Clients Section -->
@endsection
<style>
    .img1 {
        width: 70%;
    }
</style>