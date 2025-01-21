@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Formulario Solicitud Risk') }}
            </div>
            <div class="card-body">
                
            </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('javascript')

<script>
    $(function() {

        $('#justification_div').hide('fast');
        var matriz_seletion = document.getElementById("matriz_question");

        matriz_seletion.addEventListener('change', function () {

            if (matriz_seletion.value == 0 ) {
                $('#justification_div').show('fast');
            } else {
                $('#justification_div').hide('fast');
            }
        });

    });
</script>
<script>
    $(function() {
        $('select[name="sanofi_provider"]').on('change', function () {
            var processID = $(this).val();
            if (processID) {
                $.get('/getHacat/' + processID, function(data) {
                    $('select[name="hacat"]').empty();

                    $.each(data,function(key, value) {
                        $('select[name="hacat"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $.get('/getHacat/' + processID, function(data) {
                    $('select[name="hacat"]').empty();

                    $.each(data,function(key, value) {
                        $('select[name="hacat"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            }
        });
    });
</script>
<script>
    $(function() {
        
        var selectProviderType = document.getElementById("sanofi_provider");
        
        if (selectProviderType.value == 2) {
            $('#condicionPago').hide('fast');
        } else {
            $('#condicionPago').show('fast');
        }

        selectProviderType.addEventListener('change',
        function () {

            if (selectProviderType.value == 2) {
                $('#condicionPago').hide('fast');
            } else {
                $('#condicionPago').show('fast');
            }            
        });
    });
</script>
@endsection