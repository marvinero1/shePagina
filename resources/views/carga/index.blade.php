@extends('layouts.main')

@section('content')
<br><br><br><br>
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Calculo Carga de Fuego </h2>
            <p>El estudio de densidad de la carga de fuego es un procedimiento que se encuentra contemplado en la NB 58005 asi como en la legislación nacional y tiene como objetivo evaluar los distintos materiales combustibles que se encuentran en un ambiente determinado.
El objetivo que se persigue al realizar  este estudio, es el de conocer la cantidad total de calor que es capaz de generar la combustión completa de los materiales de un área. Finalmente, se obtiene la cantidad de material extinción (extintores a instalar).

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
