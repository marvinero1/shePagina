@extends('layouts.main')

@section('content')
<br><br><br><br>
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Monitoreos Ambientales</h2>
            <p> Se realiza a efectos de medir la presencia y concentración de contaminantes en el ambiente, así como el
                estado de conservación de los recursos naturales </p>
        </div>
        <br>
        <div class="row">
            @foreach($moniAmbiental as $instructoritem)
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        <img src="{{ $instructoritem->imagen }}" class="img-fluid img1" alt="imagenMoniAmbiental">
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