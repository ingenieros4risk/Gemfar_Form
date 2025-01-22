@extends('dashboard.base')
@section('css')

<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">

@endsection
@section('content')
@role('risk')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('Administración Solicitud Genfar Risk') }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('genfar.manage') }}" id="form-manage" enctype="multipart/form-data" required>
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $Client->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                            <a target="_blank" href="https://ambientetest.datalaft.com:2091/es/genfar/clients/{{ $Client->id }}" class="btn btn-block btn-secondary">Enlace Formulario Proveedor Español</a>
                                            <!-- <a target="_blank" href="https://ambientetest.datalaft.com:2091/en/genfar/clients/{{ $Client->id }}" class="btn btn-block btn-secondary">Enlace Formulario Proveedor Ingles</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Estado de la Solicitud:</label>
                                                <select name="status" id="status" class="form-control input-lg">
                                                    <option value="">--- Seleccione Estado ---</option>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Observación del cambio de estado:</label>
                                        <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-block btn-warning" form="form-manage" type="submit">
                                                <span>{{ __('Cambiar') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection


@section('javascript')
<script>

    $(function() {

        $('#seleccionDDA').hide('fast');

        var selectStatusType = document.getElementById("status");
        selectStatusType.addEventListener('change',
        function () {

            if (selectStatusType.value == 5 ) {
                $('#seleccionDDA').show('fast');
            } else {
                $('#seleccionDDA').hide('fast');
            }

        });
    });
</script>
@endsection
