@extends('layouts.app')

@section('content')
<h3 style="text-align: center;"><strong>Usuarios</strong></h3><br>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="tabla">
                <tr>
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Correo Electronico</th>
                    <th style="text-align:center;">Rol</th>
                    <th style="text-align:center;">Creacion</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $instructoritem)
                <tr>
                    <td style="text-align:center;">{{ $instructoritem->id }}</td>
                   
                    <td style="text-align:center;">{{ $instructoritem->name }}</td>
                    <td style="text-align:center;">{{ $instructoritem->email }}</td>
                    <td style="text-align:center;">{{ $instructoritem->role }}</td>
                    <td style="text-align:center;">{{ $instructoritem->created_at }}</td>

                    <td style="text-align:center;">
                        <form action="{{ route('users.destroy',$instructoritem->id ) }}" method="POST"
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
@endsection