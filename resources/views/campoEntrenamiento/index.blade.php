@extends('layouts.main')

@section('content')
<br><br><br><br>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
        <div class="container">
            <div class="breadcrumb-hero">
                <h2> Campo de Entrenamiento</h2>
                <p>Contamos con un centro de entrenamiento diseñado
                    especialmente para la capacitación y entrenamiento
                    en trabajos de alto riesgo como trabajos en altura,
                    espacios confinados, uso práctico de extintores,
                    operación de equipo pesado y otros </p>
            </div>
        </div>
    </div>
    <br><br>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        @foreach($campEntrenamiento as $instructoritem)
            <div class="portfolio-details-container">
                <div class="col-lg-12 video-box align-self-baseline">
                    <a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen }}">
                        <embed src="{{ $instructoritem->video }}" autostart=true height="620" width="1100"/>
                    </a>
                </div>
            </div>
        @endforeach
        <div class="portfolio-description">
            <h2>Diferentes Areas de Practica Especializada</h2>
            <p>
                En nuestro campo de entrenamiento, realizamos simulacros de control de fuegos en vehiculos, sub
                estaciones de gas, estaciones de combustible, trabajo en alturas, circuito de manejo defencivo 4x4,
                entrenamiento de operadores de montacargas y equipo pesado.
            </p>
        </div>

        <div id="demo" class="carousel slide" data-ride="carousel" style="width: 100%; !important">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
                <li data-target="#demo" data-slide-to="5"></li>
                <li data-target="#demo" data-slide-to="6"></li>
                <li data-target="#demo" data-slide-to="7"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/campo/1.jpg" class="img-fluid" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/campo/2.jpg" class="img-fluid" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/campo/3.jpg" class="img-fluid" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/campo/4.jpg" class="img-fluid" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/campo/5.jpg" class="img-fluid" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/campo/6.jpg" class="img-fluid" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/campo/7.jpg" class="img-fluid" alt="">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</section><!-- End Portfolio Details Section -->
@endsection