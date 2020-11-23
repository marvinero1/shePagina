@extends('layouts.main')

@section('content')
<br><br><br><br>

<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Nuestros Cursos y Capacitaciones Empresariales</h2>
            <p>En este catalogo pueden observar nuestros diferentes cursos y capacitaciones </p>
        </div>
        <div class="row">
            @foreach($curso as $instructoritem)
            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <div class="card" style="background-image: url({{ $instructoritem->imagen }});">
                    <div class="card-body">
                        <h5 class="card-title">{{ $instructoritem->titulo }}</h5>
                        <p class="card-text">{{ $instructoritem->descripcion }}</p>
                        <button type="button" class="btn btn" data-toggle="modal"
                            data-target="#exampleModal{{ $instructoritem->id }}"><i class="fa fa-plus"
                                aria-hidden="true"></i> Mas Información</button>
                    </div>
                </div>
            </div><br>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $instructoritem->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;">
                                {{ $instructoritem->titulo }}</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <img class="row container" src="{{ $instructoritem->imagen }}" style="display: block;
                                margin: auto;" alt="imagenCurso" width="467px" height="280">
                            </div>
                            <br><br>

                            <div class="entry-content">
                                <h3><strong>Contenido del Curso</strong></h3>
                                <p>{{ $instructoritem->descripcion }}</p>

                                <h4><strong>Instructor</strong></h4>
                                <h3>{{ $instructoritem->instructor }}</h3>
                                <p>{{ $instructoritem->descripcion }}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@endsection