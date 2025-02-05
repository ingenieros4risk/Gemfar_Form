<div class="card my-3">
    <div class="card-header bg-secondary text-white">
        <i class="fa fa-shield-alt"></i> Aprobación: Control Interno
    </div>
    <div class="card-body">
        <form action="{{ route('aprobar.control_interno') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $Client->id }}">

            <div class="form-group">
                <label for="comentario_control_interno">
                    Comentario o Plan de Acción
                </label>
                <textarea id="comentario_control_interno" name="comentario_control_interno" class="form-control"{{ (isset($clientForm) && $clientForm->control_interno_status === 'Aprobado') ? 'disabled' : '' }}>{{ old('comentario_control_interno', $clientForm->control_interno_comment ?? '') }}</textarea>
            </div>

            @if(! (isset($clientForm) && $clientForm->control_interno_status === 'Aprobado'))
                <button type="submit" class="btn btn-success" name="accion" value="aprobar">Aprobar</button>
            @endif
        </form>
    </div>
</div>
