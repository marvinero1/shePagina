@extends('layouts.main')

@section('content')
<br><br>
<section id="features" class="features pt-5">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Asistencia Técnica</h2>
        <p> Realizamos el servicio de asesoramiento y asistencia en temas de seguridad y medio ambiente </p>
      </div><br>
    
      <div class="row">
       @foreach($asistencia as $instructoritem) 
        <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up">
            <div class="member-img">
              <img src="{{ $instructoritem->imagen }}" class="img-fluid img1" alt="imagenAsistencia">
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