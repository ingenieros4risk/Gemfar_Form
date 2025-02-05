<div class="card my-3">
    <div class="card-header bg-secondary text-white">
        <i class="fa fa-money-bill"></i> Aprobación: Tesorería & Cartera
    </div>
    <div class="card-body">
        <form action="{{ route('aprobar.tesoreria_cartera') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $Client->id }}">

            <div class="form-group">
                <label for="comentario_tesoreria_cartera">Comentario o Plan de acción</label>
                <textarea id="comentario_tesoreria_cartera" name="comentario_tesoreria_cartera" class="form-control" {{ (isset($clientForm) && $clientForm->tesoreria_status === 'Aprobado') ? 'disabled' : '' }}>{{ old('comentario_tesoreria_cartera', $clientForm->tesoreria_comment ?? '') }}</textarea>
               
            </div>

            @if(! (isset($clientForm) && $clientForm->tesoreria_status === 'Aprobado'))
                <button type="submit" class="btn btn-success" name="accion" value="aprobar">Aprobar</button>
            @endif
        </form>
    </div>
</div>
