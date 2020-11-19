<div class="container pt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Administración Crecimiento Empresarial</strong></h3>
            <p>Los campos marcados con (*) son requeridos</p>
            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <form action="{{route('crecimiento.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>Titulo *</strong></label>
                        <input type="text" class="form-control" placeholder="Titulo Resumen" name="titulo"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Descripción *</strong></label>
                        <textarea type="text" class="form-control" placeholder="Descripción" name="descripcion"
                            required>
                            </textarea>
                    </div>
                </div><br>

                <div class="row">
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
                    <div class="col-sm-12">
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                &nbsp;Guardar</button>
                        </div>
                    </div>
                </div><br>
            </form>
        </div>
    </div>
</div><br><br>