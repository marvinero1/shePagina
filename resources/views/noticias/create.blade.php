@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Administración Noticias</strong></h3>
            <p>Los campos marcados con (*) son requeridos</p>
            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form action="{{route('noticias.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>Titulo Noticia *</strong></label>
                        <input type="text" class="form-control" placeholder="Descripcion Noticia" name="titulo" required>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Descripción Noticia *</strong></label>
                        <textarea type="text" class="form-control" placeholder="Descripción" name="descripcion"
                            required></textarea> 
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label><strong>Sección 1 *</strong></label>
                        <input type="text" class="form-control" placeholder="Titulo Sección 1" name="sec_1" required>
                    </div>
                    <div class="col-md-4">
                        <label><strong>Sección 2</strong></label>
                        <input type="text" class="form-control" placeholder="Titulo Sección 2" name="sec_2">
                    </div>
                    <div class="col-md-4">
                        <label><strong>Sección 3</strong></label>
                        <input type="text" class="form-control" placeholder="Titulo Sección 3" name="sec_3">
                    </div>
                </div><br>
                
                <div class="row">
                    <div class="col-md-4">
                        <label><strong>Descripción Sección 1 *</strong></label>
                        <textarea type="text" class="form-control" name="descripcion_sec_1"placeholder="Descripción Sección 1"
                            required>
                            </textarea>
                    </div>
                    <div class="col-md-4">
                        <label><strong>Descripción Sección 2</strong></label>
                        <textarea type="text" class="form-control" placeholder="Descripción Sección 2" name="descripcion_sec_2"
                            required>
                            </textarea>
                    </div>
                    <div class="col-md-4">
                        <label><strong>Descripción Sección 3</strong></label>
                        <textarea type="text" class="form-control" placeholder="Descripción Sección 3" name="descripcion_sec_3"
                            required>
                            </textarea>
                    </div>
                </div><br>           
                <div class="row">
                    <div class="col-sm-4" >
                        <label><strong>Imagen Portada</strong></label>
                        <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                            <strong>Imagen Portada</strong>
                        </label>
                        <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda<strong> 1500 × 1125 pixels</strong></p> 
                        <input id="file-upload" type="file" name="imagen_portada">
                    </div>
                    <div class="col-sm-4">
                        <label><strong>Imagen Seccion</strong></label>
                        <label for="file-upload1" class="custom-file-upload" style="text-align: center;">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                            <strong>Imagen Seccion</strong>
                        </label>
                        <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda<strong> 1500 × 1125 pixels</strong></p> 
                        <input id="file-upload1" type="file" name="imagen_seccion">
                    </div>
                    <div class="col-sm-4">
                        <label><strong>Autor Noticia</strong></label>
                        <input type="text" class="form-control" placeholder="Autor" name="autor">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                &nbsp;Guardar</button>
                        </div>
                    </div>
                </div>
        </div><br>
        </form>
    </div>
</div><br>

<div class="container">
    <div style="float: right;">
        <form class="form-inline my-2 my-lg-0">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscador Nombre"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px #3097D1 solid;">
                <span class="search"></span>&nbsp;Buscar</button>
        </form>
    </div><br><br><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="tabla">
                    <tr>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Imagen Portada</th>
                        <th style="text-align:center;">Imagen Seccion</th>
                        <th style="text-align:center;">Descripción Noticia</th>
                        <th style="text-align:center;">sec_1</th>
                        <th style="text-align:center;">sec_2</th>
                        <th style="text-align:center;">sec_3</th>
                        <th style="text-align:center;">descripcion_sec_1</th>
                        <th style="text-align:center;">descripcion_sec_2</th>
                        <th style="text-align:center;">descripcion_sec_3</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticia as $instructoritem)
                    <tr>
                        <td style="text-align:center;">{{ $instructoritem->id }}</td>
                        @if($instructoritem->imagen_portada == 'null')
                        <td><a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen_portada }}">
                                <img img src="/images/defaultBanco.jpg" class="img-thumbnail" alt="portadaNoticia" height="150px"
                                    width="150px" style="display: block;margin: 0 auto;">
                            </a></td>
                        @else
                        <td><a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen_portada }}">
                                <img src="{{ $instructoritem->imagen_portada }}" class="img-thumbnail" alt="portadaNoticia" height="150px"
                                    width="150px" style="display: block;margin: 0 auto;">
                            </a></td>
                        @endif
                        @if($instructoritem->imagen_seccion == '')
                        <td><a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen_seccion }}">
                                <img img src="/images/defaultBanco.jpg" class="img-thumbnail" alt="seccionNoticia" height="150px"
                                    width="150px" style="display: block;margin: 0 auto;">
                            </a></td>
                        @else
                        <td><a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen_seccion }}">
                                <img src="{{ $instructoritem->imagen_seccion }}" class="img-thumbnail" alt="seccionNoticia" height="150px"
                                    width="150px" style="display: block;margin: 0 auto;">
                            </a></td>
                        @endif
                        <td style="text-align:center;">{{ $instructoritem->descripcion }}</td>
                        <td style="text-align:center;">{{ $instructoritem->sec_1 }}</td>
                        <td style="text-align:center;">{{ $instructoritem->sec_2 }}</td>
                        <td style="text-align:center;">{{ $instructoritem->sec_3 }}</td>
                        <td style="text-align:center;">{{ $instructoritem->descripcion_sec_1 }}</td>
                        <td style="text-align:center;">{{ $instructoritem->descripcion_sec_2 }}</td>
                        <td style="text-align:center;">{{ $instructoritem->descripcion_sec_3 }}</td>

                        <td style="text-align:center;">
                            <form action="{{ route('noticias.destroy',$instructoritem->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
                                    Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<br>
<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        width: 100%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>
@endsection