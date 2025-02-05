<div class="card my-3">
    <div class="card-header bg-secondary text-white">
        <i class="fa fa-database"></i> Aprobación: Datos Maestros
    </div>
    <div class="card-body">
        <form action="{{ route('aprobar.datos_maestros') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $Client->id }}">

            <div class="form-group">
                <label for="comentario_datos_maestros">
                    Comentario o Plan de Acción
                </label>
                <textarea id="comentario_datos_maestros" name="comentario_datos_maestros" class="form-control"{{ (isset($clientForm) && $clientForm->datos_maestros_status === 'Aprobado') ? 'disabled' : '' }}>{{ old('comentario_datos_maestros', $clientForm->datos_maestros_comment ?? '') }}</textarea>
            </div>

            @if(! (isset($clientForm) && $clientForm->datos_maestros_status === 'Aprobado'))
                <button type="submit" class="btn btn-success" name="accion" value="aprobar">Aprobar</button>
            @endif
        </form>
    </div>
</div>
