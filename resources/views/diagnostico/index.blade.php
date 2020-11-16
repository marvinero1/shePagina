@extends('layouts.main')

@section('content')
<br><br><br><br>
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Estudios de identificacion de riesgos</h2>
            <p> Permite vislumbrar áreas de oportunidad y de mejora tanto organizacionales, analizando las diferentes
                áreas que conforman la empresa para definir su óptima estructura de funcionamiento.</p>
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