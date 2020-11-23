@extends('layouts.main')

@section('content')
<br><br><br><br>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
        <div class="container">
            <div class="breadcrumb-hero">
                <h2>Blog de Noticias</h2>
                <p> Las noticias y notas mas importnates en el ambito de la seguridad industruial </p>
            </div>
        </div>
    </div>
</section><!-- End Breadcrumbs -->
<br>
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            @foreach($noticia as $instructoritem)
            <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry">
                    <div class="entry-img">
                        <img class="row container" src="{{ $instructoritem->imagen_portada }}" alt="noticiaImagen" class="img-fluid"
                            width="350px" style="display: block;
                            margin: auto;" class="row container">
                    </div>
                    <h2 class="entry-title"> {{ $instructoritem->sec_1 }}</h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i>
                                {{ $instructoritem->autor }}</li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time
                                    datetime="2020-10-01">{{ $instructoritem->created_at }}</time></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>{{ $instructoritem->descripcion }}</p>
                        <button type="button" class="btn" data-toggle="modal"
                            data-target="#exampleModal{{ $instructoritem->id }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> Mas Información</button>
                    </div>
                </article>
            </div>
            {{-- MODAL --}}
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
                            <img class="row container" src="{{ $instructoritem->imagen_portada }}" alt="imagenNoticia" width="467px" height="280" style="display: block;
                            margin: auto;">
                            <br><br>

                            <div class="entry-content">
                                <h3><strong>Contenido de la Noticia </strong></h3>
                                <p>{{ $instructoritem->descripcion }}</p>

                                {{-- SECCION 1 --}}
                                <h4><strong>Secciones Noticia</strong></h4>
                                <img class="row container" src="{{ $instructoritem->imagen_seccion }}" alt="imagenNoticia" width="467px" height="280" style="display: block;
                                margin: auto;">
                                <h3>{{ $instructoritem->sec_1 }}</h3>
                                <p>{{ $instructoritem->descripcion_sec_1 }}</p>

                                {{-- SECCION 2 --}}
                                <h3>{{ $instructoritem->sec_2 }}</h3>
                                <p>{{ $instructoritem->descripcion_sec_2 }}</p>

                                {{-- SECCION 3 --}}
                                <h3>{{ $instructoritem->sec_3 }}</h3>
                                <p>{{ $instructoritem->descripcion_sec_3 }}</p>
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

        <div class="blog-pagination" data-aos="fade-up">
            <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li class="active"><a href="#">1</a></li>
                <li><a>2</a></li>
                <li><a>3</a></li>
                <li><a><i class="icofont-rounded-right"></i></a></li>
            </ul>
        </div>
    </div>
</section>
@endsection