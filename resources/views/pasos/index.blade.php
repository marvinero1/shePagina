@extends('layouts.app')

@section('content')
 <div class="container pt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Administración Primeros Pasos</strong></h3>
            <p>Los campos marcados con (*) son requeridos</p>
            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form action="{{route('pasos.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>Titulo *</strong></label>
                        <input type="text" class="form-control" placeholder="Titulo Resumen" name="titulo"
                            required>
                    </div>
                    <div class="col-sm-6">
                        <label><strong>Imagen</strong> </label>
                        <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                            <strong>Imagen</strong>
                        </label>
                        <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda<strong> 690 ×
                                430 pixels</strong></p>
                        <input id="file-upload" type="file" name="imagen">
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label><strong>Texto 1</strong></label>
                        <input type="text" class="form-control" placeholder="Texto 1" name="texto1">
                    </div>
                    <div class="col-md-4">
                        <label><strong>Texto 2</strong></label>
                        <input type="text" class="form-control" placeholder="Texto 2" name="texto2">
                    </div>
                    <div class="col-md-4">
                        <label><strong>Texto 3</strong></label>
                        <input type="text" class="form-control" placeholder="Texto 3" name="texto3">
                    </div>
                </div><br>
                <div class="row">
                   <div class="col-md-6">
                        <label><strong>Descripción *</strong></label>
                        <textarea type="text" class="form-control" placeholder="Descripción" name="descripcion"
                            required>
                            </textarea>
                    </div>
                    <div class="col-sm-6">
                        <br><br>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                &nbsp;Guardar</button>
                        </div>
                    </div>
                </div><br>
                </div>
            </form>
        </div>
    </div>
</div><br><br>

{{-- TABLA RESUMEN --}}
<div class="container bg-white">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="tabla">
                <tr>
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Titulo</th>
                    <th style="text-align:center;">Texto 1</th>
                    <th style="text-align:center;">Texto 2</th>
                    <th style="text-align:center;">Texto 3</th>
                    <th style="text-align:center;">Descripción</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paso as $instructoritem)
                <tr>
                    <td style="text-align:center;">{{ $instructoritem->id }}</td>
                    @if($instructoritem->imagen == 'null')
                    <td><a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen }}">
                            <img img src="/images/defaultBanco.jpg" class="img-thumbnail" alt="DPF"
                                height="150px" width="150px" style="display: block;margin: 0 auto;">
                        </a></td>
                    @else
                    <td><a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen }}">
                            <img src="/{{ $instructoritem->imagen }}" class="img-thumbnail" alt="DPF"
                                height="150px" width="150px" style="display: block;margin: 0 auto;">
                        </a></td>
                    @endif
                    <td style="text-align:center;">{{ $instructoritem->titulo }}</td>
                    <td style="text-align:center;">{{ $instructoritem->texto1 }}</td>
                    <td style="text-align:center;">{{ $instructoritem->texto2 }}</td>
                    <td style="text-align:center;">{{ $instructoritem->texto3 }}</td>
                    <td style="text-align:center;">{{ $instructoritem->descripcion }}</td>

                    <td style="text-align:center;">
                        <form action="{{ route('pasos.destroy',$instructoritem->id ) }}" method="POST"
                            accept-charset="UTF-8" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash"
                                    aria-hidden="true"></i>&nbsp;
                                Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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