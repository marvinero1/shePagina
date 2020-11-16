@extends('layouts.main')

@section('content')
<br><br><br><br>
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Calculo Carga de Fuego </h2>
            <p>El objetivo de realizar un estudio de carga de fuego, es el de determinar la cantidad total de calor
                capaz de desarrollar la combustión completa de todos los materiales contenidos en un sector de incendio.
            </p>
        </div>
        <br>
        <div class="row">
       @foreach($calCarga as $instructoritem) 
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        <img src="{{ $instructoritem->imagen }}" class="img-fluid img1" alt="imagenCargaFuego">
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
