<div class="card my-3">
    <div class="card-header bg-secondary text-white">
        <i class="fa fa-balance-scale"></i> Aprobación: Asuntos Regulatorios
    </div>
    <div class="card-body">
        <form action="{{ route('aprobar.asuntos_regulatorios') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $Client->id }}">

            <div class="form-group">
                <label for="comentario_asuntos_regulatorios">
                    Comentario o Plan de Acción
                </label>
                <textarea id="comentario_asuntos_regulatorios" name="comentario_asuntos_regulatorios" class="form-control"{{ (isset($clientForm) && $clientForm->regulatorio_status === 'Aprobado') ? 'disabled' : '' }}>{{ old('comentario_asuntos_regulatorios', $clientForm->regulatorio_comment ?? '') }}</textarea>
            </div>

            @if(! (isset($clientForm) && $clientForm->regulatorio_status === 'Aprobado'))
                <button type="submit" class="btn btn-success" name="accion" value="aprobar">Aprobar</button>
            @endif
        </form>
    </div>
</div>
