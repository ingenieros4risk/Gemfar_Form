<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
    @endif

    <!-- Stepwizard -->
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{__('sanofi_step_1')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}" >2</a>
                <p>{{__('sanofi_step_2')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" >3</a>
                <p>{{__('sanofi_step_3')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-success' }}" >4</a>
                <p>{{__('sanofi_step_4')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-success' }}" >5</a>
                <p>{{__('sanofi_step_6')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 6 ? 'btn-default' : 'btn-success' }}" >6</a>
                <p>{{__('sanofi_step_5')}}</p>
            </div>
        </div>
    </div>

    <!-- Password -->
    <div class="row setup-content {{ $currentStep != 0 ? 'displayNone' : '' }}" id="step-0">
        <div class="col-md-12">

            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('welcome_1')}}</div>
            <hr>
            <p> {{ __('welcome_2')}}</p>
            <hr>

            <div class="form-group" style="text-align: center;">
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>{{ __('quest_13')}}:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email_auth" wire:model="email_auth" class="form-control">
                        @error('email_auth') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group" style="text-align: center;">
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>{{ __('password')}}:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <hr>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-left" wire:click="ZeroStepSubmit" type="button" >{{__('continue')}} ></button>
        </div>
    </div>

    <!-- First Step Form -->
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-md-12">
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('informed_consent_RCGG')}}</div>
            <hr>
            <p >{{ __('welcome_subtitle') }}</p>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <h4 style="text-align: center;"><strong>{{__('acept_disclaimer')}}</strong></h4>
                </div>
                <div class="col-md-3">
                    <input name="check_risk" wire:model="check_risk" class="form-control" type="checkbox">
                </div>
            </div>
            <br>
            <div class="row">
                @error('check_risk')
                <div class="col-md-12">
                  <span style="border-color: red;" class="form-control text-danger error">{{ $message }}</span>
                </div>
                @enderror
            </div>
            <hr>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-left" wire:click="firstStepSubmit" type="button" >{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                </svg>
            </a>
        </div>
    </div>

    <!-- Second Step Form -->
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-md-12">
			<hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('sanofi_step_1_title')}}</div>
            <hr>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="sanofi_provider"><h4><strong>{{__('proveedor_type')}}:</strong></h4></label>
                    <select class="form-control-sm form-control" wire:model="sanofi_provider">
                    @foreach($providers as $provider)
                        @if($sanofi_provider == $provider->id)
                        <option selected disabled value="{{$provider->id}}">{{$provider->name}}</option>
                        @endif
                    @endforeach
                    </select>
                    @error('sanofi_provider') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="type_person"><h4><strong>{{__('type_person')}}:</strong></h4></label>
                    <select class="form-control-sm form-control" wire:model="type_person" required>
                        <option value="">Seleccione un tipo de persona</option>
                        <option value=1>Individuo/Individual</option>Individual / Organization
                        <option value=2>Organización/Organization</option>
                    </select>
                    @error('type_person') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="country_homologation"><h4><strong>{{__('country_select')}}:</strong></h4></label>
                    <select class="form-control-sm form-control" wire:model="country_homologation">
                        <option value="">{{__('seleccionar_un_pais')}}</option>
                    @foreach($paises as $pais)
                        <option value="{{$pais->id}}">{{$pais->name}}</option>
                    @endforeach
                    </select>
                    @error('country_homologation') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for=""><h4><strong>{{__('country_homologation')}}:</strong></h4></label>
                    <div class="row">
                        <div class="col-md-9 col-form-label text-align">
                        @foreach($countries as $index => $country)
                            @if($index != 1)
                            <div class="form-check checkbox">
                                <input wire:model="multiple_select_country.{{ $index }}" class="form-check-input text-align" type="checkbox" value="{{$country->id}}">
                                <label class="form-check-label">{{$country->country}}</label>
                            </div>
                            @endif
                        @endforeach
                        @error('multiple_select_country') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <hr>
            @if($csi == 1)
            <div style="text-align: left;" class="btn btn-block btn-primary" ><strong>{{__('t_manifestacion')}}</strong></div>
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
                    <input class="form-control" type="checkbox" name="check_manifestacion" wire:model="check_manifestacion">
                </div>
                @error('check_manifestacion') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            @endif            
            <hr>
	        <br>
            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button" wire:click="back(1)">{{__('back')}}</button>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button" wire:click.prevent="secondStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                </svg>
            </a>
        </div>
    </div>

    <!-- FORM LEGAL STEP (3) -->
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-md-12">
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
                        <input class="form-control" type="checkbox" name="check_genfar_1" wire:model="check_genfar_1">
                    </div>
                    @error('check_genfar_1') <span class="text-danger error">{{ $message }}</span> @enderror
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
                        <input class="form-control" type="checkbox" name="check_genfar_2" wire:model="check_genfar_2">
                    </div>
                    @error('check_genfar_2') <span class="text-danger error">{{ $message }}</span> @enderror
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
                        <input class="form-control" type="checkbox" name="check_genfar_3" wire:model="check_genfar_3">
                    </div>
                    @error('check_genfar_3') <span class="text-danger error">{{ $message }}</span> @enderror
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
                        <input class="form-control" type="checkbox" name="check_genfar_4" wire:model="check_genfar_4">
                    </div>
                    @error('check_genfar_4') <span class="text-danger error">{{ $message }}</span> @enderror
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
                        <input class="form-control" type="checkbox" name="check_genfar_5" wire:model="check_genfar_5">
                    </div>
                    @error('check_genfar_5') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <hr>
            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button" wire:click="back(2)">{{__('back')}}</button>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button" wire:click="thirdStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                </svg>
            </a>
        </div>
    </div>

    <!-- FORM GENFAR STEP (4) -->
    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-md-12">
            <hr>
            <!-- Advertencia -->
            <div class="form-group">
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-warning" role="alert">En caso de que una pregunta no aplique, llene el campo como <strong>NO APLICA</strong>. - In case a question does not apply, fill in the field as <strong>DOES NOT APPLY</strong></div>
                    </div>
                </div>
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-info" role="alert">El máximo de caracteres permitidos por campo son <strong>30.</strong> - The maximum characters allowed per field are <strong>30</strong>.</div>
                    </div>
                </div>
            </div>
            <hr>

        <!-- FORM VENDORS/HCO/NGO -->
        @if($sanofi_provider == 1 or $sanofi_provider == 4 or $sanofi_provider == 5)
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('sanofi_step_4_1')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="country"><strong>{{ __('quest_2')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" wire:model="country_homologation" disabled>
                        @foreach($paises as $pais)
                            <option value="{{$pais->id}}">{{$pais->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    @error('country_homologation') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_3')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_3" wire:model="quest_3" value="{{$quest_3}}" class="form-control">
                        @error('quest_3') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_4')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_4" wire:model="quest_4" value="{{$quest_4}}" class="form-control">
                        @error('quest_4') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <!--Quest Person Type -->
            @if($sanofi_provider == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_5')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="quest_5" wire:model="quest_5" value="{{$quest_5}}" class="form-control">
                            @error('quest_5') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @elseif($sanofi_provider == 4 or $sanofi_provider == 5)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_6')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_6" value="{{$quest_6}}" wire:model="quest_6">
                            @error('quest_6') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_9')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_9" wire:model="quest_9" value="{{$quest_9}}" class="form-control">
                        @error('quest_9') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!--Quest is COPE Document-->
            @if(in_array(1,$multiple_select_country) or in_array(3,$multiple_select_country))
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_10')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="quest_10" wire:model="quest_10" min="0" max="9" value="{{$quest_10}}" class="form-control">
                            @error('quest_10') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_16')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" autocomplete="off" class="form-control" name="quest_16" value="{{$quest_16}}" wire:model="quest_16">
                            @error('quest_16') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_11')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"class="form-control" name="quest_11" value="{{$quest_11}}" wire:model="quest_11">
                        @error('quest_11') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_12')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_12" value="{{$quest_12}}" wire:model="quest_12">
                        @error('quest_12') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_14')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" autocomplete="off" class="form-control" name="quest_14" value="{{$quest_14}}" wire:model="quest_14">
                        @error('quest_14') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_15')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" autocomplete="off" class="form-control" name="quest_15" value="{{$quest_15}}" wire:model="quest_15">
                        @error('quest_15') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_17')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_17" value="{{$quest_17}}" wire:model="quest_17">
                        @error('quest_17') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                            <label><strong>{{ __('quest_18')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_18" value="{{$quest_18}}" wire:model="quest_18">
                        @error('quest_18') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                            <label><strong>{{ __('quest_19')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" autocomplete="off" class="form-control" name="quest_19" value="{{$quest_19}}" wire:model="quest_19">
                        @error('quest_19') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('sanofi_step_4_2')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_27')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_27" value="{{$quest_27}}" wire:model="quest_27">
                        @error('quest_27') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_28')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_28" value="{{$quest_28}}" wire:model="quest_28">
                        @error('quest_28') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_29')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_29" value="{{$quest_29}}" wire:model="quest_29">
                        @error('quest_29')<span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_30')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_30" wire:model="quest_30">
                            <option value="">Seleccione un tipo de Cuenta/Select an Account Type</option>
                            <option value="1">Corriente/Current</option>
                            <option value="2">Ahorros/Savings</option>
                            <option value="3">IBAN</option>
                        </select>
                        <div class="col-md-9">
                            @error('quest_30') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_31')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_31" value="{{$quest_31}}" wire:model="quest_31">
                        @error('quest_31') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!--Quest is PE -->
            @if(in_array(3,$multiple_select_country))
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_32')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_32" value="{{$quest_32}}" wire:model="quest_32">
                            @error('quest_32') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_36')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="is_detraccion" wire:model="is_detraccion">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('is_detraccion') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                @if($is_detraccion == 1)
                    <div class="form-group">
                        <div class="row">
                            <div style="border-color: red" class="col-md-12">
                                <div class="alert alert-warning" role="alert">El llenar correctamente la información de su cuenta de detracción, asegurará el pago a tiempo de sus servicios.
                                <strong>You must fill the form correctly (Cuenta de detracción) to ensure your payments on time.</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="border-color: red" class="col-md-12">
                                <div class="alert alert-danger" role="alert">La cuenta de detracción debe tener 13 dígitos.
                                <strong>The withdrawal account must have 13 digits.</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_96')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="quest_96" value="{{$quest_96}}" wire:model="quest_96">
                                @error('quest_96') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <!--Quest is Detraccion -->
            @if($is_detraccion == 1)
                <hr>
                <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_7')}}</div>
                <hr>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_92')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_92" value="{{$quest_92}}" wire:model="quest_92">
                                @error('quest_92') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_93')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_93" value="{{$quest_93}}" wire:model="quest_93">
                                @error('quest_93') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_94')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="quest_94" value="{{$quest_94}}" wire:model="quest_94">
                                @error('quest_94') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_95')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_95" value="{{$quest_95}}" wire:model="quest_95">
                                @error('quest_95') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_97')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="quest_97" value="{{$quest_97}}" wire:model="quest_97">
                                @error('quest_97') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_98')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_98" value="{{$quest_98}}" wire:model="quest_98">
                                @error('quest_98') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_99')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_99" value="{{$quest_99}}" wire:model="quest_99">
                                @error('quest_99') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_100')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_100" value="{{$quest_100}}" wire:model="quest_100">
                                @error('quest_100') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_101')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="quest_101" value="{{$quest_101}}" wire:model="quest_101">
                                @error('quest_101') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_102')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_102" value="{{$quest_102}}" wire:model="quest_102">
                                @error('quest_102') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endif

            <hr>
            @if($sanofi_provider != 2)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_46')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$quest_46}}" readonly="true">
                            @error('quest_46') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_47')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="quest_47" wire:model="quest_47">
                                <option value="">Seleccione un Tipo de Moneda/Select a Currency Type</option>
                                @foreach($money as $key)
                                <option value="{{$key->id}}">{{$key->name}} - {{$key->iso}} ({{$key->symbol}}) </option>
                                @endforeach
                            </select>
                            @error('quest_47') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <hr>

            <!--Quest Internacional -->
            @if($is_international == 1)
                <hr>
                <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_3')}}</div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_38')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="quest_38" wire:model="quest_38">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_38') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="country"><strong>{{ __('quest_39')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" wire:model="country_homologation" disabled>
                                <option value="">{{__('seleccionar_un_pais')}}</option>
                            @foreach($paises as $pais)
                                <option value="{{$pais->id}}">{{$pais->name}}</option>
                            @endforeach
                            </select>
                            <div class="col-md-9">
                                @error('quest_39') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_40')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_40" value="{{$quest_40}}" wire:model="quest_40">
                            @error('quest_40') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_41')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_41" value="{{$quest_41}}" wire:model="quest_41">
                            @error('quest_41') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_42')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_42" value="{{$quest_42}}" wire:model="quest_42">
                            @error('quest_42') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_43')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_43" value="{{$quest_43}}" wire:model="quest_43">
                            @error('quest_43') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_44')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_44" value="{{$quest_44}}" wire:model="quest_44">
                            @error('quest_44') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_45')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$quest_45}}" wire:model="quest_45">
                            @error('quest_45') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_5_2')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_59')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_59" value="{{$quest_59}}" wire:model="quest_59">
                        @error('quest_59') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_60')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_60" value="{{$quest_60}}" wire:model="quest_60">
                        @error('quest_60') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_61')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_61" value="{{$quest_61}}" wire:model="quest_61">
                        @error('quest_61') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_5')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_49')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_49" value="{{$quest_49}}" wire:model="quest_49">
                        @error('quest_49') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_50')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_50" wire:model="quest_50">
                        <option value="">Seleccione un tipo de Documento/Select a Document Type</option>
                        @foreach($document_types as $document)
                            <option value="{{$document->id}}">{{$document->cat}} - {{$document->name}}</option>
                        @endforeach
                        </select>
                        @error('quest_50') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_51')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_51" value="{{$quest_51}}" wire:model="quest_51">
                        @error('quest_51') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_52')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" name="quest_52" value="{{$quest_52}}" wire:model="quest_52">
                        @error('quest_52') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_53')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_53" value="{{$quest_53}}" wire:model="quest_53">
                        @error('quest_53') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_54')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_54" value="{{$quest_54}}" wire:model="quest_54">
                        @error('quest_54') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_55')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" autocomplete="off" class="form-control" name="quest_55" value="{{$quest_55}}" wire:model="quest_55">
                        @error('quest_55') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_56')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_56" wire:model="quest_56">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('quest_56') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_57')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_57" wire:model="quest_57">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('quest_57') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_58')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_58" wire:model="quest_58">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('quest_58') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_8')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_103')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_103" wire:model="quest_103">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('quest_103') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_104')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_104" wire:model="quest_104">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('quest_104') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
        @endif

        <!-- FORM HCP/HACO-->
        @if($sanofi_provider == 3 or $sanofi_provider == 6)
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('sanofi_step_4_1')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_1')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control" name="quest_1" value="{{$quest_1}}" wire:model="quest_1">
                        @error('quest_1') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_2')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" wire:model="country_homologation" disabled>
                            <option value="">{{__('seleccionar_un_pais')}}</option>
                            @foreach($paises as $pais)
                                <option value="{{$pais->id}}">{{$pais->name}}</option>
                            @endforeach
                        </select>
                        @error('country_homologation') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                            <label><strong>{{__('quest_3')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_3" value="{{$quest_3}}" wire:model="quest_3">
                        @error('quest_3') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_4')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_4" value="{{$quest_4}}" wire:model="quest_4">
                        @error('quest_4') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!--Quest Type Medical Person-->
            @if($sanofi_provider == 6)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_5')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_5" value="{{$quest_5}}" wire:model="quest_5">
                            @error('quest_5') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @elseif($sanofi_provider == 3)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_6')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_6" value="{{$quest_6}}" wire:model="quest_6">
                            @error('quest_6') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_22')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="quest_22" wire:model="quest_22" >
                                <option value="">{{__('seleccionar_un_documento')}}</option>
                                @foreach($document_types as $docs)
                                    <option value="{{$docs->id}}">{{$docs->name}}</option>
                                @endforeach
                                </select>
                                @error('quest_22') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

            <div class="form-group">
                <div class="row">
                    @if($sanofi_provider == 3)
                        <div class="col-md-3">
                            <label><strong>{{__('quest_8')}}:</strong></label>
                        </div>
                    @elseif($sanofi_provider == 6)
                        <div class="col-md-3">
                            <label><strong>{{__('quest_9')}}:</strong></label>
                        </div>
                    @endif
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_8" value="{{$quest_8}}" wire:model="quest_8">
                        @error('quest_8') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!--Quest is CO-->
            @if(in_array(1,$multiple_select_country))
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_10')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="quest_10" min="0" value="{{$quest_10}}" max="99" wire:model="quest_10">
                            @error('quest_10') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                            <label><strong>{{__('quest_11')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_11" value="{{$quest_11}}" wire:model="quest_11">
                        @error('quest_11') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    @if($sanofi_provider == 3)
                    <div class="col-md-3">
                        <label><strong>{{__('quest_54')}}:</strong></label>
                    </div>
                    @else
                    <div class="col-md-3">
                        <label><strong>{{__('quest_12')}}:</strong></label>
                    </div>
                    @endif
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_12" value="{{$quest_12}}" wire:model="quest_12">
                        @error('quest_12') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                            <label><strong>{{__('quest_14')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_14" value="{{$quest_14}}" wire:model="quest_14">
                        @error('quest_14') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>


            @if($sanofi_provider == 6)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_15')}}</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_15" value="{{$quest_15}}" wire:model="quest_15">
                            @error('quest_15') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                                <label><strong>{{__('quest_17')}}</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_17" value="{{$quest_17}}" wire:model="quest_17">
                            @error('quest_17') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_18')}}</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_18" value="{{$quest_18}}" wire:model="quest_18">
                            @error('quest_18') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                                <label><strong>{{__('quest_19')}}</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_19" value="{{$quest_19}}" wire:model="quest_19">
                            @error('quest_19') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @elseif($sanofi_provider == 3)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_21')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="quest_21" wire:model="quest_21">
                                <option value="">{{__('seleccionar_un_pais')}}</option>
                                @foreach($paises as $pais)
                                    <option value="{{$pais->id}}">{{$pais->name}}</option>
                                @endforeach
                                </select>
                                @error('quest_21') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_16')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_16" value="{{$quest_16}}" wire:model="quest_16">
                        @error('quest_16') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('sanofi_step_4_2')}}</div>
            <hr>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_27')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_27" value="{{$quest_27}}" wire:model="quest_27">
                        @error('quest_27') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_28')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_28" value="{{$quest_28}}" wire:model="quest_28">
                        @error('quest_28') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('quest_29')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_29" value="{{$quest_29}}" wire:model="quest_29">
                        @error('quest_29') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_30')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="quest_30" wire:model="quest_30">
                            <option value="">Seleccione un tipo de Cuenta/Select an Account Type</option>
                            <option value="1">Corriente/Current</option>
                            <option value="2">Ahorros/Savings</option>
                            <option value="3">IBAN</option>
                        </select>
                        <div class="col-md-9">
                            @error('quest_30') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_31')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="quest_31" value="{{$quest_31}}" wire:model="quest_31">
                        @error('quest_31') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!--Quest is PE -->
            @if(in_array(3,$multiple_select_country))
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_32')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_32" value="{{$quest_32}}" wire:model="quest_32">
                            @error('quest_32') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_36')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="is_detraccion" wire:model="is_detraccion">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('is_detraccion') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                @if($is_detraccion == 1)
                    <div class="form-group">
                        <div class="row">
                            <div style="border-color: red" class="col-md-12">
                                <div class="alert alert-warning" role="alert">El llenar correctamente la información de su cuenta de detracción, asegurará el pago a tiempo de sus servicios.
                                <strong>You must fill the form correctly (Cuenta de detracción) to ensure your payments on time.</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="border-color: red" class="col-md-12">
                                <div class="alert alert-danger" role="alert">La cuenta de detracción debe tener 13 dígitos.
                                <strong>The withdrawal account must have 13 digits.</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_96')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="quest_96" value="{{$quest_96}}" wire:model="quest_96">
                                @error('quest_96') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <!--Quest is Detraccion -->
            @if($is_detraccion == 1)
                <hr>
                <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_7')}}</div>
                <hr>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_92')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_92" value="{{$quest_92}}" wire:model="quest_92">
                                @error('quest_92') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_93')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_93" value="{{$quest_93}}" wire:model="quest_93">
                                @error('quest_93') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_94')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="quest_94" value="{{$quest_94}}" wire:model="quest_94">
                                @error('quest_94') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_95')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_95" value="{{$quest_95}}" wire:model="quest_95">
                                @error('quest_95') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_97')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="quest_97" value="{{$quest_97}}" wire:model="quest_97">
                                @error('quest_97') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_98')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_98" value="{{$quest_98}}" wire:model="quest_98">
                                @error('quest_98') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_99')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_99" value="{{$quest_99}}" wire:model="quest_99">
                                @error('quest_99') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_100')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_100" value="{{$quest_100}}" wire:model="quest_100">
                                @error('quest_100') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_101')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="quest_101" value="{{$quest_101}}" wire:model="quest_101">
                                @error('quest_101') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{ __('quest_102')}}</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quest_102" value="{{$quest_102}}" wire:model="quest_102">
                                @error('quest_102') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endif

            <!--Quest Internacional -->
            @if($is_international == 1)
                <hr>
                <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_3')}}</div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_38')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="quest_38" wire:model="quest_38">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_38') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="country"><strong>{{ __('quest_39')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" wire:model="country_homologation" disabled>
                                <option value="">{{__('seleccionar_un_pais')}}</option>
                            @foreach($paises as $pais)
                                <option value="{{$pais->id}}">{{$pais->name}}</option>
                            @endforeach
                            </select>
                            <div class="col-md-9">
                                @error('quest_39') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_40')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_40" value="{{$quest_40}}" wire:model="quest_40">
                            @error('quest_40') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_41')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_41" value="{{$quest_41}}" wire:model="quest_41">
                            @error('quest_41') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_42')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_42" value="{{$quest_42}}" wire:model="quest_42">
                            @error('quest_42') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_43')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_43" value="{{$quest_43}}" wire:model="quest_43">
                            @error('quest_43') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_44')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$quest_44}}" name="quest_44" wire:model="quest_44">
                            @error('quest_44') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('quest_45')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="quest_45" value="{{$quest_45}}" wire:model="quest_45">
                            @error('quest_45') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

            @endif
        @endif
        <!-- FORM PROVIDER 2 -->
        @if($sanofi_provider == 2)
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_4_1')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_5')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_5" wire:model="quest_5" value="{{$quest_5}}" class="form-control">
                        @error('quest_5') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_75')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_75" wire:model="quest_75" value="{{$quest_75}}" class="form-control">
                        @error('quest_75') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_9')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_9" wire:model="quest_9" value="{{$quest_9}}" class="form-control">
                        @error('quest_9') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_11')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_11" wire:model="quest_11" value="{{$quest_11}}" class="form-control">
                        @error('quest_11') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_4')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_4" wire:model="quest_4" value="{{$quest_4}}" class="form-control">
                        @error('quest_4') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_3')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_3" wire:model="quest_3" value="{{$quest_3}}" class="form-control">
                        @error('quest_3') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="country"><strong>{{ __('quest_2')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" wire:model="country_homologation" disabled>
                        @foreach($paises as $pais)
                            <option value="{{$pais->id}}">{{$pais->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    @error('country_homologation') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_76')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_76" wire:model="quest_76" value="{{$quest_76}}" class="form-control">
                        @error('quest_76') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_12')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_12" wire:model="quest_12" value="{{$quest_12}}" class="form-control">
                        @error('quest_12') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_77')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="quest_77" wire:model="quest_77" value="{{$quest_77}}" class="form-control">
                        @error('quest_12') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('quest_13')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" autocomplete="off" name="quest_13" wire:model="quest_13" value="{{$quest_13}}" class="form-control">
                        @error('quest_12') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        @endif
        <hr>

        <!-- ETICAL EBI ETICAL EBI ETICAL EBI ETICAL EBI ETICAL EBI ETICAL EBI ETICAL EBI ETICAL EBI ETICAL EBI -->

        <!--Quest Suministro Internacional -->
        @if($csi == 1)
        <div class="form-group">
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-dark">{{ __('title_csi')}}</div>
            <hr>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_1')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_1" wire:model="csi_1">
                        <option value="Mas de 15 años">Mas de 15 años</option>
                        <option value="De 10 a 15 años">De 10 a 15 años</option>
                        <option value="De 5 a 10 años">De 5 a 10 años</option>
                        <option value="Menos de 5 años">Menos de 5 años</option>
                    </select>
                    @error('csi_1') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_2')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_2" wire:model="csi_2">
                        <option value="OEA /C-TPAT / AEO / NEEC">OEA /C-TPAT / AEO / NEEC</option>
                        <option value="ISO 28000 / BASC">ISO 28000 / BASC</option>
                        <option value="Ninguna">Ninguna</option>
                    </select>
                    @error('csi_2') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_3')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_3" wire:model="csi_3">
                        <option selected value="">{{ __('seleccione')}}</option>
                        <option value="SI">{{ __('si')}}</option>
                        <option value="NO">{{ __('no')}}</option>
                        <input type="text" placeholder="Si la repuesta es SI, indique que material de empaque" class="form-control" name="empaque" wire:model="empaque">
                    </select>
                    @error('csi_3') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_10')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_10" wire:model="csi_10">
                        <option selected value="">{{ __('seleccione')}}</option>
                        <option value="SI">{{ __('si')}}</option>
                        <option value="NO">{{ __('no')}}</option>
                        <input type="text" placeholder="Si la repuesta es SI, indique cuales servicios" class="form-control" name="servicios" wire:model="servicios">
                    </select>
                    @error('csi_10') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_4')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_4" wire:model="csi_4">
                        <option value="EXW">EXW</option>
                        <option value="FOB-FCA">FOB-FCA</option>
                        <option value="CPT-CFR">CPT-CFR</option>
                        <option value="DDP">DDP</option>
                    </select>
                    @error('csi_4') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csi_5')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Indique en que país(es), presta servicios:" name="csi_5" wire:model="csi_5">
                        @error('csi_5') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_6')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_6" wire:model="csi_6">
                        <option selected value="">{{ __('seleccione')}}</option>
                        <option value="SI">{{ __('si')}}</option>
                        <option value="NO">{{ __('no')}}</option>
                        <input type="text" placeholder="Si la repuesta es SI, indique que tipo de información confidencial?" class="form-control" name="confidencial" wire:model="confidencial">
                    </select>
                    @error('csi_6') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_7')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_7" wire:model="csi_7">
                        <option selected value="">{{ __('seleccione')}}</option>
                        <option value="SI">{{ __('si')}}</option>
                        <option value="NO">{{ __('no')}}</option>
                    </select>
                    @error('csi_7') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_8')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_8" wire:model="csi_8">
                        <option selected value="">{{ __('seleccione')}}</option>
                        <option value="SI">{{ __('si')}}</option>
                        <option value="NO">{{ __('no')}}</option>
                    </select>
                    @error('csi_8') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <label><strong>{{ __('csi_9')}}</strong></label>
                </div>
                <div class="col-md-3">
                    <select class="form-control-sm form-control" name="csi_9" wire:model="csi_9">
                        <option selected value="">{{ __('seleccione')}}</option>
                        <option value="SI">{{ __('si')}}</option>
                        <option value="NO">{{ __('no')}}</option>
                    </select>
                    @error('csi_9') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        @endif


        <!--Quest Ethical -->
        @if($ethichal == 1)
            @if($type_person == 2)
                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_1')}}</div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_24')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_24" wire:model="quest_24">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_24') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_2')}}</div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_71')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_71" wire:model="quest_71">
                            @error('quest_71') <span class="text-danger error">{{ $message }}</span> @enderror
                            <input type="file" class="form-control" name="quest_71f" wire:model="quest_71f" required>
                            @error('quest_71f') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_25')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_25" wire:model="quest_25">
                            @error('quest_25') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_26')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_26" wire:model="quest_26">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_26') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                @if($quest_26 == 1)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('quest_33')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="quest_33" wire:model="quest_33">
                                @error('quest_33') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_34')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_34" wire:model="quest_34">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_34') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_34 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('quest_70')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="quest_70" wire:model="quest_70">
                            @error('quest_70') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                @elseif($quest_34 == 0)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_37')}}:</strong></label>
                            <a target="_blank" href="https://www.sanofi.com/-/media/Project/One-Sanofi-Web/Websites/Global/Sanofi-COM/Home/common/docs/download-center/Anti_bribery_policy_Novembre_2017.pdf">Política antisoborno de Genfar</a>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_37" wire:model="quest_37">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_37') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_3')}}</div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_73')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_73" wire:model="quest_73">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_73') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_73 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_73_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_73_add" wire:model="quest_73_add">
                            @error('quest_73_add') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_74')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_74" wire:model="quest_74">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_74') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_48')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_48" wire:model="quest_48">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_48') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_48 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_73_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_48f" wire:model="quest_48f">
                            @error('quest_48f') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_72')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_72" wire:model="quest_72">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_72') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                @if($quest_72 == 1)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>{{ __('quest_73_add')}}</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quest_72F" wire:model="quest_72F">
                                @error('quest_72F') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_4')}}</div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_64')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_64" wire:model="quest_64">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_64') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_64 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_73_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_64f" wire:model="quest_64f">
                            @error('quest_64f') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_65')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_65" wire:model="quest_65">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_65') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_65 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_73_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_65f" wire:model="quest_65f">
                            @error('quest_65f') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_66')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_66" wire:model="quest_66">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_66') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_67')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_67" wire:model="quest_67">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_67') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_5')}}</div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_68')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_68" wire:model="quest_68">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_68') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_68 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_68_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_68f" wire:model="quest_68f">
                            @error('quest_68f') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_6')}}</div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_69')}}:</strong></label>
                            <ul>
                                <li><strong>{{ __('quest_69_1')}}</strong></li>
                                <li><strong>{{ __('quest_69_2')}}</strong></li>
                                <li><strong>{{ __('quest_69_3')}}</strong></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="quest_69" required wire:model="quest_69" type="checkbox">
                        </div>
                    </div>
                    <div class="row">
                        @error('quest_69')
                        <div class="col-md-12">
                            <span style="border-color: red;" class="form-control text-danger error">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
            @elseif($type_person == 1)

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_1')}}</div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_37')}}:</strong></label>
                            <a target="_blank" href="https://www.sanofi.com/-/media/Project/One-Sanofi-Web/Websites/Global/Sanofi-COM/Home/common/docs/download-center/Anti_bribery_policy_Novembre_2017.pdf">Política antisoborno de Genfar</a>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_37" wire:model="quest_37">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_37') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_73')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_73" wire:model="quest_73">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_73') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_73 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_73_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_73_add" wire:model="quest_73_add">
                            @error('quest_73_add') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif
                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_2')}}</div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_64')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_64" wire:model="quest_64">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_64') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_64 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_68_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_64f" wire:model="quest_64f">
                            @error('quest_64f') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_72')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_72" wire:model="quest_72">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_72') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                @if($quest_72 == 1)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>{{ __('quest_73_add')}}</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quest_72F" wire:model="quest_72F">
                                @error('quest_72F') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_3')}}</div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_68')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control-sm form-control" name="quest_68" wire:model="quest_68">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('quest_68') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if($quest_68 == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>{{ __('quest_68_add')}}</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="quest_68f" wire:model="quest_68f">
                            @error('quest_68f') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-warning" >{{ __('sanofi_step_ebi_5')}}</div>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label><strong>{{ __('quest_69')}}:</strong></label>
                            <label><strong>{{ __('quest_69_1')}}:</strong></label>
                            <label><strong>{{ __('quest_69_2')}}:</strong></label>
                            <label><strong>{{ __('quest_69_3')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="quest_69" required wire:model="quest_69" type="checkbox">
                            @error('quest_69') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <!--Quest Corporate Social Responsib-->
        @if($csr == 1)
            <div class="form-group">
                <hr>
                    <div style="text-align: left;" class="btn btn-block btn-danger" >{{ __('genfar_step_csr')}}</div>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_1')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_1" wire:model="csr_1">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_1') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_2')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_2" wire:model="csr_2">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_2') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_3')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_3" wire:model="csr_3">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_3') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_4')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_4" wire:model="csr_4">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_4') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_5')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_5" wire:model="csr_5">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_5') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_6')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_6" wire:model="csr_6">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_6') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_7')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_7" wire:model="csr_7">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_7') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_8')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_8" wire:model="csr_8">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_8') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_9')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_9" wire:model="csr_9">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_9') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_10')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_10" wire:model="csr_10">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_10') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csr_11')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csr_11" wire:model="csr_11">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csr_11') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        @endif

        <!--Quest Health, Safety -->
        @if($hys == 1)
            <hr>
                <div style="text-align: left;" class="btn btn-block btn-info" >{{ __('genfar_step_hs')}}</div>
            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_1')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_1" wire:model="hys_1">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_1') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_2')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_2" wire:model="hys_2">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_2') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_3')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_3" wire:model="hys_3">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_3') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_4')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_4" wire:model="hys_4">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_4') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_5')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_5" wire:model="hys_5">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_5') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_6')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_6" wire:model="hys_6">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_6') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_7')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_7" wire:model="hys_7">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_7') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('hys_8')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="hys_8" wire:model="hys_8">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('hys_8') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        @endif

        <!--Quest Environment -->
        @if($env == 1)
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-success" >{{ __('genfar_step_env')}}</div>
            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_1')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_1" wire:model="env_1">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_1') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_2')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_2" wire:model="env_2">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_2') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_3')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_3" wire:model="env_3">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_3') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_4')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_4" wire:model="env_4">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_4') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_5')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_5" wire:model="env_5">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_5') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_6')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_6" wire:model="env_6">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_6') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_7')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_7" wire:model="env_7">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_7') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('env_8')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="env_8" wire:model="env_8">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('env_8') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        @endif


        <!--Quest Cybersecurity -->
        @if($csy == 1)
            <hr>
                <div style="text-align: left;" class="btn btn-block btn-warning" >Cuestionario Seguridad Cibernética</div>
            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-9">
                        <label><strong>{{ __('csy_1')}}</strong></label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control-sm form-control" name="csy_1" wire:model="csy_1">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('csy_1') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        @endif

            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button" wire:click="back(3)">{{__('back')}}</button>
            @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button" wire:click="fourtStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                </svg>
            </a>

        </div>
    </div>

    <!-- BF (5) -->

    <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
        <div class="col-md-12">

        @if($type_person == 1)
        <div class="col-md-12">
        <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('ANEXO E. DECLARACIÓN JURADA DE BENEFICIARIOS FINALES.')}}</div>
            <div class="form-group">
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-info" role="alert"><p><strong>Para este tipo de Persona no es necesario </strong> realizar la vinculación DECLARACIÓN JURADA DE BENEFICIARIOS FINALES</p></div>
                    </div>
                </div>
            </div>
            <hr>
            <button class="btn btn-pill btn-outline-dark nextBtn btn-sm pull-right" type="button" wire:click="back(4)">{{__('back')}}</button>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button" wire:click="fifttStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                </svg>
            </a>
        </div>
        @else
        <div class="col-md-12">
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('ANEXO E. DECLARACIÓN JURADA DE BENEFICIARIOS FINALES.')}}</div>
            <div class="form-group">
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-info" role="alert"><p><strong>{{$quest_5}}</strong> realiza la vinculación DECLARACIÓN JURADA DE BENEFICIARIOS FINALES</p></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div style="border-color: red" class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        <strong>Beneficiario Final:</strong> Es aquella persona natural que, directa o indirectamente, posee o controla a una persona jurídica o un ente o estructura jurídica.
                        Por favor relacione a continuación <strong>la información de las personas naturales o jurídicas que tienen el control</strong> (por ejemplo: grupos empresariales, matrices o controlantes, o cualquier otra forma de control) o ejercen influencia, directamente o indirectamente, en el cliente o proveedor:
                    </div>
                </div>
            </div>
            <hr>
            <p>En este formulario es necesario especificar la información de los terceros, por favor seleccione una de las siguientes opciones:</p>
            <ul>
                <li><strong>(Opción 1)</strong> Son 1 o más Terceros Identificados.</li>
                <li><strong>(Opción 2)</strong> Son más de 10 Terceros y los tengo previamente identificados.</li>
                <li><strong>(Opción 3)</strong> No cuento o no suministro la información de BENEFICIARIOS FINALES</li>
            </ul>
            <hr>
            <div class="form-group">
                <strong>{{__('Señale si se trata de un nuevo tercero (indicando el tipo de tercero) o si es actualización de datos o Si No suministra información:')}}</strong>
                <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" value="1" wire:model="moreCoincidences">
                        <label class="form-check-label">1 a 5 Terceros:</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" value="2" wire:model="moreCoincidences">
                        <label class="form-check-label">+10 Terceros:</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" value="0" wire:model="moreCoincidences">
                        <label class="form-check-label">No Suministra Información de Beneficiarios Finales:</label>
                    </div>
                </div>
            </div>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('I. Información General de los Beneficiarios Finales')}}</div>
            <hr>

            <!-- // Si No hay BF  -->
            @if($moreCoincidences == 0)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="select_coincidencia" class="form-control-label"><strong>En caso de no suministrar la información requerida, a continuación se exponen los motivos que llevan a la no entrega, indicando claramente las normas en que se sustenta:</strong></label>
                            <textarea class="form-control" wire:model="adicional_text" rows="3" placeholder="p. ej. No cuento con toda la información"></textarea>
                            @error('adicional_text') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                            <input type="file" wire:model="no_coincidence_file">
                            @error('no_coincidence_file') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            @elseif($moreCoincidences == 1)
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-warning" role="alert">En caso de que una pregunta no aplique, llene el campo como <strong>NO APLICA</strong>. - In case a question does not apply, fill in the field as <strong>DOES NOT APPLY</strong></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-pill btn-success btn-sm" wire:click="addInput">Agregar Tercero</button>
                        </div>
                        <hr>
                        @foreach ($inputs as $index => $input)
                            <div class="form-group card col-md-12 border-primary">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4>Información del Beneficiario #{{$index+1}}</h4>
                                    </div>
                                    <div class="col-sm-3">
                                        <button style="float: right; margin-left: -50%;" type="button" class="btn btn-pill btn-danger btn-sm" wire:click="removeInput({{ $index }})">
                                            <a>
                                                <svg class="c-icon">
                                                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-trash"></use>
                                                </svg>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><strong>{{ __('Nombre Completo:')}}</strong></label>
                                            <input type="text" class="form-control" placeholder="Nombre Completo o Razón Social:" wire:model="full_name.{{$index}}" required>
                                            @error('full_name.{{$index}}') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label><strong>{{ __('quest_22')}}:</strong></label>
                                            <select class=" form-control" name="document_beneficial_ownership.{{$index}}" wire:model="document_beneficial_ownership.{{$index}}" >
                                                @foreach($document_types as $docs)
                                                    <option value="{{$docs->id}}">{{$docs->name}}</option>
                                                @endforeach
                                            </select>
                                        @error('document_beneficial_ownership.{{$index}}') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>{{ __('Documento de Identificación')}}:</strong></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Número de Documento de Identificación:" wire:model="bf_document.{{$index}}" required>
                                            @error('bf_document.{{$index}}') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label><strong>{{ __('% Participación:')}}</strong></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" wire:model="participation_control.{{$index}}" placeholder="p. ej: 5%" required>
                                            @error('participation_control.{{$index}}') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label><strong>{{ __('Es PEP:')}}</strong></label>
                                            <select class="form-control-sm form-control" wire:model="is_pep.{{$index}}">
                                                <option value="">Seleccione una respuesta</option>
                                                    <option value="1">{{ __('si')}}</option>
                                                    <option value="0">{{ __('no')}}</option>
                                            </select>
                                            @error('is_pep.{{$index}}') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif($moreCoincidences == 2)
                <div class="form-group">
                    <p>Señale la cantidad total de terceros relacionados en el adjunto</p>
                    <div class="form-group">
                        <label for="amount_thirds"><strong>Cantidad total de terceros relacionados en el adjunto:</strong></label>
                        <input type="number" wire:model="amount_thirds" class="form-control" id="amount_thirds" min="10">
                        @error('amount_thirds') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                    <p>En caso de adjuntar una lista de terceros, por favor identificar los siguientes campos:</p>
                    <ul>
                        <li>Nombre Completo</li>
                        <li>Tipo de Documento</li>
                        <li>Número de documento de identificación</li>
                        <li>Porcentaje de Participación</li>
                        <li>Responder a la pregunta ¿Es un PEP?</li>
                    </ul>
                    <p >Por favor adjunte el archivo donde se encuentren sus terceros</p>
                    <input type="file" wire:model="coincidence_file">
                    @error('coincidence_file') <span class="text-danger error">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="coincidence_file">Cargando Documento ...</div>
                    <br>
                </div>
            @endif

            @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

            <hr>
            <button class="btn btn-pill btn-outline-dark nextBtn btn-sm pull-right" type="button" wire:click="back(4)">{{__('back')}}</button>
            <button class="btn btn-pill btn-outline-primary nextBtn btn-sm pull-right" type="button" wire:click="fifttStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm" style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                </svg>
            </a>
        </div>
        @endif
        </div>

    </div>

    <!-- Documents (6) -->
    <div class="row setup-content {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-6">

        <div class="col-md-12">

            <hr>
                <div style="text-align: left;" class="btn btn-block btn-primary" >{{ __('sanofi_step_5')}}</div>
            <hr>

            @if($sanofi_provider != 3)

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('certificado_existencia')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="certificado_existencia" wire:model="certificado_existencia">
                        @error('certificado_existencia') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            @endif

            @if($sanofi_provider == 3 or $sanofi_provider == 4)
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('cedula_rep')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="cedula_rep" wire:model="cedula_rep">
                        @error('cedula_rep') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
                @if($sanofi_provider == 4)
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('licencia_medica')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="licencia_medica" wire:model="licencia_medica">
                        @error('licencia_medica') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('curriculum_vitae')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="curriculum_vitae" wire:model="curriculum_vitae">
                        @error('curriculum_vitae') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
                @endif
            @endif

            @if($sanofi_provider != 3)

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('certificado_bancaria')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="certificado_bancaria" wire:model="certificado_bancaria">
                        @error('certificado_bancaria') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            @endif

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('rut')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="rut" wire:model="rut">
                        @error('rut') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <hr>

            @if($csi == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{ __('certificaciones_seguridad')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control" name="certificaciones_seguridad" wire:model="certificaciones_seguridad">
                                <option selected value="">{{ __('seleccione')}}</option>
                                <option value="1">{{ __('si')}}</option>
                                <option value="0">{{ __('no')}}</option>
                            </select>
                            @error('certificaciones_seguridad') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                @if($certificaciones_seguridad == 1)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('file_basc')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="file" name="file_basc" wire:model="file_basc">
                                @error('file_basc') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-3">
                                <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="date_basc" value="{{$date_basc}}" wire:model="date_basc">
                                @error('date_basc') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('file_iso28000')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="file" name="file_iso28000" wire:model="file_iso28000">
                                @error('file_iso28000') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-3">
                                <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="date_iso28000" value="{{$date_iso28000}}" wire:model="date_iso28000">
                                @error('date_iso28000') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('file_neec')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="file" name="file_neec" wire:model="file_neec">
                                @error('file_neec') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-3">
                                <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="date_neec" value="{{$date_neec}}" wire:model="date_neec">
                                @error('date_neec') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('file_ctpat')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="file" name="file_ctpat" wire:model="file_ctpat">
                                @error('file_ctpat') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-3">
                                <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="date_ctpat" value="{{$date_ctpat}}" wire:model="date_ctpat">
                                @error('date_ctpat') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('file_seguridad_otro')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="file" name="file_seguridad_otro" wire:model="file_seguridad_otro">
                                @error('file_seguridad_otro') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-3">
                                <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="date_seguridad_otro" value="{{$date_seguridad_otro}}" wire:model="date_seguridad_otro">
                                @error('date_seguridad_otro') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>{{__('file_bcp')}}:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="file_bcp" wire:model="file_bcp">
                                @error('file_bcp') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                @endif

            @endif

            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('certificaciones_hse')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="certificaciones_hse" wire:model="certificaciones_hse">
                            <option selected value="">{{ __('seleccione')}}</option>
                            <option value="1">{{ __('si')}}</option>
                            <option value="0">{{ __('no')}}</option>
                        </select>
                        @error('certificaciones_hse') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            @if($certificaciones_hse == 1)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>{{ __('title_hse')}}</strong></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_iso14001')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_iso14001" wire:model="file_iso14001">
                            @error('file_iso14001') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_iso14001" value="{{$date_iso14001}}" wire:model="date_iso14001">
                            @error('date_iso14001') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_iso45001')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_iso45001" wire:model="file_iso45001">
                            @error('file_iso45001') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_iso45001" value="{{$date_iso45001}}" wire:model="date_iso45001">
                            @error('date_iso45001') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_ruc')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_ruc" wire:model="file_ruc">
                            @error('file_ruc') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_ruc" value="{{$date_ruc}}" wire:model="date_ruc">
                            @error('date_ruc') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_iso26000')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_iso26000" wire:model="file_iso26000">
                            @error('file_iso26000') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_iso26000" value="{{$date_iso26000}}" wire:model="date_iso26000">
                            @error('date_iso26000') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_sa8000')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_sa8000" wire:model="file_sa8000">
                            @error('file_sa8000') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_sa8000" value="{{$date_sa8000}}" wire:model="date_sa8000">
                            @error('date_sa8000') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_smeta')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_smeta" wire:model="file_smeta">
                            @error('file_smeta') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_smeta" value="{{$date_smeta}}" wire:model="date_smeta">
                            @error('date_smeta') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_psci')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_psci" wire:model="file_psci">
                            @error('file_psci') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_psci" value="{{$date_psci}}" wire:model="date_psci">
                            @error('date_psci') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('file_ecovadis')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="file_ecovadis" wire:model="file_ecovadis">
                            @error('file_ecovadis') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_ecovadis" value="{{$date_ecovadis}}" wire:model="date_ecovadis">
                            @error('date_ecovadis') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('hse_otros')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="hse_otros" wire:model="hse_otros">
                            @error('hse_otros') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3">
                            <label><strong>{{__('fecha_vigencia')}}:</strong></label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="hse_date" value="{{$hse_date}}" wire:model="hse_date">
                            @error('hse_date') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            <button class="btn btn-pill btn-outline-dark nextBtn btn-sm pull-right" type="button" wire:click="back(5)">{{__('back')}}</button>
            <button class="btn btn-pill btn-primary nextBtn btn-sm pull-right" type="button" wire:click="sixtStepSubmit">{{__('submit')}} ></button>

        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 99 ? 'displayNone' : '' }}" id="step-6">

        <div class="col-md-12">
            <hr>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Solicitud Agregada Satisfactoriamente! - Request Added Satisfactorily!</h4>
                <hr>
                <p class="mb-0">Uno proveedor de Risk estará comunicandose con su información para continuar con su proceso de homologación./A Risk provider will be communicating with your information to continue with its approval process.</p>
            </div>
            <hr>
        </div>
    </div>
</div>