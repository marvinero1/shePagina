@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Administración Campo de Entrenamiento</strong></h3>
            <p>Los campos marcados con (*) son requeridos</p>
            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form action="{{route('campoEntrenamiento.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="row">
                    <div class="col-sm-6" >
                        <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                            <strong>Video *</strong>
                        </label>
                        {{-- <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda<strong> 1500 × 1125 pixels</strong></p>  --}}
                        <input id="file-upload" type="file" name="video">
                    </div>
                    <div class="col-sm-6">
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
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="tabla">
                <tr>
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Video</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campEntrenamiento as $instructoritem)
                <tr>
                    <td style="text-align:center;">{{ $instructoritem->id }}</td>
                   
                    <td style="text-align:center;">
                        <a class="image-popup-vertical-fit" href="{{ $instructoritem->imagen }}">
                            <embed src="{{ $instructoritem->video }}" autostart=false width="320" height="240"/>
                        </a>
                    </td>

                    <td style="text-align:center;">
                        <form action="{{ route('campoEntrenamiento.destroy',$instructoritem->id ) }}" method="POST"
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