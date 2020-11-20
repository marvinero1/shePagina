@extends('layouts.main')

@section('content')
<br><br><br><br>
<!-- ======= Features Section ======= -->
<section id="features" class="features">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Procedimientos Psst</h2>
      <p> El Ministerio de Trabajo, a través de la Resolución Ministerial N° 1411/18 de 27 de diciembre de 2018, aprobó la Norma Técnica de Seguridad NTS-009/18 para la presentación y aprobación de los Programas de Seguridad y Salud en el Trabajo (PSST); desarrollamos los programas de seguridad a medida de su empresa. </p>
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