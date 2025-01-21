<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport">
  <meta http-equiv="X-UA-Compatible">
  <title>Manifestacion Suscrita</title>
</head>

<body>
    <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                  <label>{{__('quest_6')}}:</label>
                  {{$requests_form->name}}
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                  <label>{{__('quest_9')}}:</label>
                  {{$requests_form->document}}
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                  <label>{{__('quest_1')}}:</label>
                  {{$requests_form->created_at}} GMT-5
              </div>
          </div>
    </div>
    <div style="text-align: left;" class="btn btn-block btn-primary" ><strong>{{__('t_manifestacion')}}</strong>
    </div>
            <hr>
            <p>{{__('manifestacion_1')}}</p>
            <p>{{__('manifestacion_2')}}</p>
            <p>{{__('manifestacion_3')}}</p>   
            <ol>
                <li><p>{{__('manifestacion_4')}}</p></li>
                <li><p>{{__('manifestacion_5')}}</p></li>
                <li><p>{{__('manifestacion_6')}}</p></li>
                <li><p>{{__('manifestacion_7')}}</p></li>
                <li><p>{{__('manifestacion_8')}}</p></li>
                <li><p>{{__('manifestacion_9')}}</p></li>
                <li><p>{{__('manifestacion_10')}}</p></li>
                <li><p>{{__('manifestacion_11')}}</p></li>
                <li><p>{{__('manifestacion_12')}}</p></li>
                <li><p>{{__('manifestacion_13')}}</p></li>
                <li><p>{{__('manifestacion_14')}}</p></li>
                <li><p>{{__('manifestacion_15')}}</p></li>
                <li><p>{{__('manifestacion_16')}}</p></li>
                <li><p>{{__('manifestacion_17')}}</p></li>
                <li><p>{{__('manifestacion_18')}}</p></li>
                <li><p>{{__('manifestacion_19')}}</p></li>
            </ol>     
            <p>{{__('manifestacion_20')}}</p>
            <div class="row">
                <div class="col-md-9">
                    <p style="text-align: center;"><strong>{{__('p10')}}</strong></p>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="checkbox" checked>
                </div>
            </div>
</body>

</html>
