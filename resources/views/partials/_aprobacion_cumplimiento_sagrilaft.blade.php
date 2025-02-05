<div class="card my-3">
    <div class="card-header bg-secondary text-white">
        <i class="fa fa-user-secret"></i> Aprobación: Oficial Cumplimiento / Sagrilaft
    </div>
    <div class="card-body">
        <form action="{{ route('aprobar.cumplimiento_sagrilaf') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $Client->id }}">

            <div class="form-group">
                <label for="comentario_cumplimiento_sagrilaft">
                    Comentario o Plan de Acción
                </label>
                <textarea id="comentario_cumplimiento_sagrilaft" name="comentario_cumplimiento_sagrilaft" class="form-control"{{ (isset($clientForm) && $clientForm->cumplimiento_status === 'Aprobado') ? 'disabled' : '' }}>{{ old('comentario_cumplimiento_sagrilaft', $clientForm->cumplimiento_comment ?? '') }}</textarea>
            </div>

            @if(! (isset($clientForm) && $clientForm->cumplimiento_status === 'Aprobado'))
                <button type="submit" class="btn btn-success" name="accion" value="aprobar">Aprobar</button>
            @endif
        </form>
    </div>
</div>
