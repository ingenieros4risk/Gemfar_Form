<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport">
  <meta http-equiv="X-UA-Compatible">
  <title>{{__('consentimiento_informado')}}</title>
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center mb-3"> {{__('consentimiento_informado')}} </h2>
    <div class="col-md-12">

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
        <div class="form-group">
                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-primary" ><strong>{{__('legal_co')}}</strong></div>
                <hr>
                <h3 style="text-align: center;"> {{__('warning_privacity')}}</h3>
                <hr>
                <p>{{__('p1')}}</p>
                <p>{{__('p2')}}</p>
                <p>{{__('p3')}}</p>
                <p>{{__('p4')}}</p>
                <p>{{__('p5')}}</p>
                <p>{{__('p7')}}</p>
                <p>{{__('p8')}}</p>
                <h4 style="text-align: center;"> {{__('t1')}}</h4>
                <p>{{__('p9')}}</p>
                <div class="row">
                    <div class="col-md-9">
                        <p style="text-align: center;"><strong>{{__('p10')}}</strong></p>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="checkbox" name="check_genfar_1" wire:model="check_genfar_1" checked>
                    </div>
                </div>
                <hr>
                <br>
                <h4 style="text-align: center;"> {{__('t4')}}</h4>
                <p>{{__('p15')}}</p>
                <hr>
                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                        <th>País/Country</th>
                        <th>Compañía/Company</th>
                        <th>Identificación/ID</th>
                        <th>Correo Electrónico/Email</th>
                        <th>Declaración de privacidad/Privacy Policy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Colombia</td>
                        <td>Genfar S.A.</td>
                        <td>NIT 817001644-1</td>
                        <td>protecciondatosgenfar@genfar.com</td>
                        <td><a target="_blank" href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a></td>
                        </tr>
                        <tr>
                        <td>Colombia</td>
                        <td>Genfar Desarrollo y Manufactura S.A.</td>
                        <td>NIT 800226384-6</td>
                        <td>protecciondatosgenfar@genfar.com</td>
                        <td><a target="_blank" href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a></td>
                        </tr>
                        <tr>
                        <td>Perú</td>
                        <td>Genfar del Perú S.A.C.</td>
                        <td>RUC 20609981262</td>
                        <td>protecciondatosgenfar@genfar.com</td>
                        <td><a target="_blank" href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a></td>
                        </tr>
                        <tr>
                        <td>Ecuador</td>
                        <td>Genfar del Ecuador S.A.S.</td>
                        <td>RUC 1793197944001</td>
                        <td>protecciondatosgenfar@genfar.com</td>
                        <td><a target="_blank" href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                @if($sanofi_provider == 3 or $sanofi_provider == 4)
                <h4 style="text-align: center;"> {{__('t2')}}</h4>
                <h4 style="text-align: center;"> {{__('t3')}}</h4>
                <p>{{__('p13')}}</p>
                <div class="row">
                    <div class="col-md-9">
                        <p style="text-align: center;"><strong>{{__('p14')}}</strong></p>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="checkbox" name="check_genfar_2" wire:model="check_genfar_2" checked>
                    </div>
                </div>
                @endif
                <hr>
                <h4 style="text-align: center;"> {{__('t5')}}</h4>
                <p>{{__('p16')}}</p>
                <ol>
                    <li><p>{{__('p17')}}</p></li>
                    <li><p>{{__('p18')}}</p></li>
                    <li><p>{{__('p19')}}</p></li>
                    <li><p>{{__('p20')}}</p></li>
                    <li><p>{{__('p21')}}</p></li>
                    <li><p>{{__('p22')}}</p></li>
                    <li><p>{{__('p23')}}</p></li>
                </ol>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <p style="text-align: center;"><strong>{{__('acept_disclaimer')}}</strong></p>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="checkbox" name="check_genfar_3" wire:model="check_genfar_3" checked>
                    </div>
                </div>
                <hr>
                <h4 style="text-align: center;"> {{__('t6')}}</h4>
                <p>{{__('p24')}}</p>
                <p>{{__('p25')}}</p>
                <div class="row">
                    <div class="col-md-9">
                        <p style="text-align: center;"><strong>{{__('acept_disclaimer')}}</strong></p>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="checkbox" name="check_genfar_4" wire:model="check_genfar_4" checked>
                    </div>
                </div>
                <hr>
                <h4 style="text-align: center;"> {{__('t7')}}</h4>
                <p>{{__('p26')}}</p>
                <p>{{__('p27')}}</p>
                <ul>
                    @if(app()->getLocale() == 'es')
                        <li><a target="_blank" href="{{ asset('files/conducta.pdf') }}">{{__('codigo')}}</a></li>
                    @else
                        <li><a target="_blank" href="{{ asset('files/conducta_en.pdf') }}">{{__('codigo')}}</a></li>
                    @endif
                    <li><a target="_blank" href="{{ asset('files/Politica_Antisoborno_Genfar.pdf') }}">{{__('politica')}}</a></li>
                    @if(app()->getLocale() == 'es')
                    <li><a target="_blank" href="{{ asset('files/tyc.pdf') }}">{{__('terminos')}}</a></li>
                    @else
                    <li><a target="_blank" href="{{ asset('files/tyc_en.pdf') }}">{{__('terminos')}}</a></li>
                    @endif
                </ul>
                <div class="row">
                    <div class="col-md-9">
                        <p style="text-align: center;"><strong>{{__('acept_disclaimer')}}</strong></p>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="checkbox" name="check_genfar_5" wire:model="check_genfar_5" checked>
                    </div>
                </div>
            </div>
      </div>
  </div>
</body>

</html>
