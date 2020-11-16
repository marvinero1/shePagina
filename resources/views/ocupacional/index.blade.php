@extends('layouts.main')

@section('content')
<br><br><br><br>
<section id="features" class="features">
    <div class="container">
        <div class="section-title">
            <h2>Monitoreos Ocupacionales</h2>
            <p> Nos permite reconocer, evaluar y controlar los factores de riesgo ocupacional generados en el lugar de
                trabajo con el fin de prevenir las enfermedades profesionale</p>
        </div><br>

        <div class="row">
          @foreach($moniOcupacional as $instructoritem)
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        <img src="{{ $instructoritem->imagen }}" class="img-fluid img1" alt="imagenmoniOcupacional">
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
    .img1 {
        width: 500px;
        height: 400px;
    }
</style>
@endsection