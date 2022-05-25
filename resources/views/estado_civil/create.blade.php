<!-- Modal insertar-->
<div class="modal fade" id="crearestadomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('estado_civil.store') }}" role="form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="box box-info padding-1">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="correo">Estado Civil</label>
                                <input type="text" name="descripcion" class="form-control{{$errors->has('descripcion') ? ' is-invalid' : ''}}" placeholder="Estado Civil">
                                @if ($errors->has('descripcion'))
                                    <span class="text-danger"> {{$errors->first('descripcion')}}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>


