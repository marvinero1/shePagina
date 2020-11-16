@extends('layouts.main')

@section('content')
<br><br><br><br>
<!-- ======= Features Section ======= -->
<section id="features" class="features">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Procedimientos Psst</h2>
      <p> El Programa de Seguridad y Salud en el Trabajo se constituye en el documento que regirá de forma interna en cada Empresa </p>
    </div>
    <br>
    <div class="row">
      @foreach($psst as $instructoritem)
      <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up">
              <div class="member-img">
                  <img src="{{ $instructoritem->imagen }}" class="img-fluid img1" alt="imagenPSST">
              </div>
              <div class="member-info">
                  <br>
                  <h4>{{ $instructoritem->titulo }}</h4>
                  <p>{{ $instructoritem->descripcion }}</p>
              </div>
          </div>
      </div><br>
      @endforeach
  </div>
</section>
<style>
  .img1{
    width: 500px; 
    height: 400px;
  }
</style>
@endsection