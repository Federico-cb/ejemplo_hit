<!-- Modal insertar-->
<div class="modal fade" id="crearcarreramodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('carreras.store') }}" role="form" enctype="multipart/form-data">
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
                <label for="correo">Carrera</label>
                <input type="text" name="descripcion_carrera" class="form-control{{$errors->has('descripcion_carrera') ? ' is-invalid' : ''}}" placeholder="Carrera">
                    @if ($errors->has('descripcion_carrera'))
                        <span class="text-danger"> {{$errors->first('descripcion_carrera')}}</span>
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


