@extends('layouts.main')

@section('content')
<br><br><br><br>
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Estudios de identificacion de riesgos</h2>
            <p> El Diagnóstico Integral permite identificar condiciones actuales en su empresa es  una radiografia completa de las condiciones físicas y administrativas relacionadas a la seguridad y el medioambiente, también nos permite  identificar oportunidades de mejora analizando las diferentes áreas que conforman la empresa. </p>
        </div>
        <br>
        <div class="row">
            @foreach($diagnostico as $instructoritem)
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        <img src="{{ $instructoritem->imagen }}" class="img-fluid img1" alt="imagenDiagnotico">

                    </div>
                    <div class="member-info"><br>
                        <h4>{{ $instructoritem->titulo }}</h4>
                        <p>{{ $instructoritem->descripcion }}</p>
                    </div>
                </div>
            </div>
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