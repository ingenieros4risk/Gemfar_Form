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
                <a type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{__('genfar_step_2')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</a>
                <p>{{__('sanofi_step_3')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-success' }}">4</a>
                <p>{{__('sanofi_step_4')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-success' }}">5</a>
                <p>{{__('sanofi_step_6')}}</p>
            </div>

            <div class="stepwizard-step">
                <a type="button" class="btn btn-circle {{ $currentStep != 6 ? 'btn-default' : 'btn-success' }}">6</a>
                <p>{{__('sanofi_step_5')}}</p>
            </div>
        </div>
    </div>

    <!-- Password -->
    <div class="row setup-content {{ $currentStep != 0 ? 'displayNone' : '' }}" id="step-0">
        <div class="col-md-12">

            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary">{{ __('welcome_1')}}</div>
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
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-left" wire:click="ZeroStepSubmit"
                type="button">{{__('continue')}} ></button>
        </div>
    </div>

    <!-- First Step Form -->
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-md-12">
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary">{{ __('informed_consent_RCGG')}}</div>
            <hr>
            <p>{{ __('welcome_subtitle') }}</p>
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
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-left" wire:click="firstStepSubmit"
                type="button">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
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
            <div style="text-align: left;" class="btn btn-block btn-primary">{{__('sanofi_step_1_title')}}</div>
            <hr>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="type_person">
                        <h4><strong>{{__('type_person')}}:</strong></h4>
                    </label>
                    <select class="form-control-sm form-control" wire:model="type_person" required>
                        <option value="">Seleccione un tipo de persona</option>
                        <option value=1>Individuo/Individual</option>Individual / Organization
                        <option value=2>Organización/Organization</option>
                    </select>
                    @error('type_person') <span style="border-color: red;"
                        class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="country_homologation">
                        <h4><strong>{{__('country_select')}}:</strong></h4>
                    </label>
                    <select class="form-control-sm form-control" wire:model="country_homologation">
                        <option value="">{{__('seleccionar_un_pais')}}</option>
                        @foreach($paises as $pais)
                        <option value="{{$pais->id}}">{{$pais->name}}</option>
                        @endforeach
                    </select>
                    @error('country_homologation') <span style="border-color: red;"
                        class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>

            <hr>
            <br>
            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button"
                wire:click="back(1)">{{__('back')}}</button>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button"
                wire:click.prevent="secondStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
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
                <div style="text-align: left;" class="btn btn-block btn-primary"><strong>{{__('legal_co')}}</strong>
                </div>
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
                            <td><a target="_blank"
                                    href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Colombia</td>
                            <td>Genfar Desarrollo y Manufactura S.A.</td>
                            <td>NIT 800226384-6</td>
                            <td>protecciondatosgenfar@genfar.com</td>
                            <td><a target="_blank"
                                    href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Perú</td>
                            <td>Genfar del Perú S.A.C.</td>
                            <td>RUC 20609981262</td>
                            <td>protecciondatosgenfar@genfar.com</td>
                            <td><a target="_blank"
                                    href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Ecuador</td>
                            <td>Genfar del Ecuador S.A.S.</td>
                            <td>RUC 1793197944001</td>
                            <td>protecciondatosgenfar@genfar.com</td>
                            <td><a target="_blank"
                                    href="https://www.genfar.com/politica-de-privacidad">https://www.genfar.com/politica-de-privacidad</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
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

                <hr>
                <h4 style="text-align: center;"> {{__('t5')}}</h4>
                <p>{{__('p16')}}</p>
                <ol>
                    <li>
                        <p>{{__('p17')}}</p>
                    </li>
                    <li>
                        <p>{{__('p18')}}</p>
                    </li>
                    <li>
                        <p>{{__('p19')}}</p>
                    </li>
                    <li>
                        <p>{{__('p20')}}</p>
                    </li>
                    <li>
                        <p>{{__('p21')}}</p>
                    </li>
                    <li>
                        <p>{{__('p22')}}</p>
                    </li>
                    <li>
                        <p>{{__('p23')}}</p>
                    </li>
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

                    <li><a target="_blank"
                            href="{{ asset('files/Politica_Antisoborno_Genfar.pdf') }}">{{__('politica')}}</a></li>

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
            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button"
                wire:click="back(2)">{{__('back')}}</button>
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button"
                wire:click="thirdStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
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
                        <div class="alert alert-warning" role="alert">En caso de que una pregunta no aplique, llene el
                            campo como <strong>NO APLICA</strong>. - In case a question does not apply, fill in the
                            field as <strong>DOES NOT APPLY</strong></div>
                    </div>
                </div>
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-info" role="alert">El máximo de caracteres permitidos por campo son
                            <strong>30.</strong> - The maximum characters allowed per field are <strong>30</strong>.
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary">{{__('tc2')}}</div>
            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc8')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc8" wire:model="qc8" value="{{$qc8}}" class="form-control">
                        @error('qc8') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc9')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm form-control" name="qc9" wire:model="qc9">
                            <option value="">Seleccione un tipo de Documento/Select a Document Type</option>
                            @foreach($document_types as $document)
                            <option value="{{$document->id}}">{{$document->cat}} - {{$document->name}}</option>
                            @endforeach
                        </select>
                        @error('qc9') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc10')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc10" wire:model="qc10" value="{{$qc10}}" class="form-control">
                        @error('qc10') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc11')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc11" wire:model="qc11" value="{{$qc11}}" class="form-control">
                        @error('qc11') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc12')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc12" wire:model="qc12" value="{{$qc12}}" class="form-control">
                        @error('qc12') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc13')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc13" wire:model="qc13" value="{{$qc13}}" class="form-control">
                        @error('qc13') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc14')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc14" wire:model="qc14" value="{{$qc14}}" class="form-control">
                        @error('qc14') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc15')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc15" wire:model="qc15" value="{{$qc15}}" class="form-control">
                        @error('qc15') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc16')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc16" wire:model="qc16" value="{{$qc16}}" class="form-control">
                        @error('qc16') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc17')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc17" wire:model="qc17" value="{{$qc17}}" class="form-control">
                        @error('qc17') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc18')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc18" wire:model="qc18" value="{{$qc18}}" class="form-control">
                        @error('qc18') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc19')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc19" wire:model="qc19" value="{{$qc19}}" class="form-control">
                        @error('qc19') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc20')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc20" wire:model="qc20" value="{{$qc20}}" class="form-control">
                        @error('qc20') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc21')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc21" wire:model="qc21" value="{{$qc21}}" class="form-control">
                        @error('qc21') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc22')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc22" wire:model="qc22" value="{{$qc22}}" class="form-control">
                        @error('qc22') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc23')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc23" wire:model="qc23" value="{{$qc23}}" class="form-control">
                        @error('qc23') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc24')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc24" wire:model="qc24" value="{{$qc24}}" class="form-control">
                        @error('qc24') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc25')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc25" wire:model="qc25" value="{{$qc25}}" class="form-control">
                        @error('qc25') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc26')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc26" wire:model="qc26" value="{{$qc26}}" class="form-control">
                        @error('qc26') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc27')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc27" wire:model="qc27" value="{{$qc27}}" class="form-control">
                        @error('qc27') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc28')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc28" wire:model="qc28" value="{{$qc28}}" class="form-control">
                        @error('qc28') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc29')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc29" wire:model="qc29" value="{{$qc29}}" class="form-control">
                        @error('qc29') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc30')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc30" wire:model="qc30" value="{{$qc30}}" class="form-control">
                        @error('qc30') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc31')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc31" wire:model="qc31" value="{{$qc31}}" class="form-control">
                        @error('qc31') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc32')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc32" wire:model="qc32" value="{{$qc32}}" class="form-control">
                        @error('qc32') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc33')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc33" wire:model="qc33" value="{{$qc33}}" class="form-control">
                        @error('qc33') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div> -->
            <hr>
            <!-- <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('tc3')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc34')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select name="qc34" wire:model="qc34" class="form-control">
                            <option value="">Seleccione una opción</option>
                            @foreach($legal_entities as $entity)
                                <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                            @endforeach
                        </select>
                        @error('qc34') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc35') }}:</strong></label>
                    </div>
                    <div class="col-md-9">
                    <select name="qc35" wire:model="qc35" class="form-control">
                        <option value="">Seleccione una opción</option>
                        @foreach($sales_organization as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                        @error('qc35') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc36') }}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select name="qc36" wire:model="qc36" class="form-control">
                        <option value="">Seleccione una opción</option>
                            @foreach($channels as $channel)
                                <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                            @endforeach
                        </select>
                        @error('qc36') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc37') }}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select name="qc37" wire:model="qc37" class="form-control">
                        <option value="">Seleccione una opción</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        @error('qc37') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc38')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc38" wire:model="qc38" value="{{$qc38}}" class="form-control">
                        @error('qc38') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc39')}}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc39" wire:model="qc39" value="{{$qc39}}" class="form-control">
                        @error('qc39') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc40') }}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select name="qc40" wire:model="qc40" class="form-control">
                        <option value="">Seleccione una opción</option>
                            @foreach($oficinas_ventas as $oficina)
                                <option value="{{ $oficina->id }}">{{ $oficina->name }}</option>
                            @endforeach
                        </select>
                        @error('qc40') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc41') }}</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select name="qc41" wire:model="qc41" class="form-control">
                        <option value="">Seleccione una opción</option>

                            @foreach($grupos_vendedores as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                            @endforeach
                        </select>
                        @error('qc41') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr> -->
            <!-- <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('tc4')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc42')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc42" wire:model="qc42" value="{{$qc42}}" class="form-control">
                        @error('qc42') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc43')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc43" wire:model="qc43" value="{{$qc43}}" class="form-control">
                        @error('qc43') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc44')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc44" wire:model="qc44" value="{{$qc44}}" class="form-control">
                        @error('qc44') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc45')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc45" wire:model="qc45" value="{{$qc45}}" class="form-control">
                        @error('qc45') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc46')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc46" wire:model="qc46" value="{{$qc46}}" class="form-control">
                        @error('qc46') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc47')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc47" wire:model="qc47" value="{{$qc47}}" class="form-control">
                        @error('qc47') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc48')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc48" wire:model="qc48" value="{{$qc48}}" class="form-control">
                        @error('qc48') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc49')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc49" wire:model="qc49" value="{{$qc49}}" class="form-control">
                        @error('qc49') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('tc5')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc50')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc50" wire:model="qc50" value="{{$qc50}}" class="form-control">
                        @error('qc50') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc51')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc51" wire:model="qc51" value="{{$qc51}}" class="form-control">
                        @error('qc51') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc52')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc52" wire:model="qc52" value="{{$qc52}}" class="form-control">
                        @error('qc52') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc53')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc53" wire:model="qc53" value="{{$qc53}}" class="form-control">
                        @error('qc53') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc54')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc54" wire:model="qc54" value="{{$qc54}}" class="form-control">
                        @error('qc54') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc55')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc55" wire:model="qc55" value="{{$qc55}}" class="form-control">
                        @error('qc55') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc56')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc56" wire:model="qc56" value="{{$qc56}}" class="form-control">
                        @error('qc56') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc57')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc57" wire:model="qc57" value="{{$qc57}}" class="form-control">
                        @error('qc57') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div> -->
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary">{{__('tc6')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc58')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc58" wire:model="qc58" value="{{$qc58}}" class="form-control">
                        @error('qc58') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc59')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc59" wire:model="qc59" value="{{$qc59}}" class="form-control">
                        @error('qc59') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc60')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc60" wire:model="qc60" value="{{$qc60}}" class="form-control">
                        @error('qc60') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc61')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc61" wire:model="qc61" value="{{$qc61}}" class="form-control">
                        @error('qc61') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
            <!-- <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('tc7')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc62')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc62" wire:model="qc62" value="{{$qc62}}" class="form-control">
                        @error('qc62') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc63')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc63" wire:model="qc63" value="{{$qc63}}" class="form-control">
                        @error('qc63') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc64')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc64" wire:model="qc64" value="{{$qc64}}" class="form-control">
                        @error('qc64') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc65')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc65" wire:model="qc65" value="{{$qc65}}" class="form-control">
                        @error('qc65') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc66')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc66" wire:model="qc66" value="{{$qc66}}" class="form-control">
                        @error('qc66') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc67')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc67" wire:model="qc67" value="{{$qc67}}" class="form-control">
                        @error('qc67') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc68')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc68" wire:model="qc68" value="{{$qc68}}" class="form-control">
                        @error('qc68') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div style="text-align: left;" class="btn btn-block btn-primary" >{{__('tc8')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc69')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc69" wire:model="qc69" value="{{$qc69}}" class="form-control">
                        @error('qc69') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr> -->
            <div style="text-align: left;" class="btn btn-block btn-primary">{{__('tc9')}}</div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc70')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc70" wire:model="qc70" value="{{$qc70}}" class="form-control">
                        @error('qc70') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc71')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc71" wire:model="qc71" value="{{$qc71}}" class="form-control">
                        @error('qc71') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div> -->
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc72')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="qc72" wire:model="qc72" value="{{$qc72}}" class="form-control">
                        @error('qc72') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div> -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('qc73') }}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <select name="qc73" wire:model="qc73" class="form-control">
                            <option value="">Seleccione una opción</option>
                            @foreach($money as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        @error('qc73') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <hr>
            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button"
                wire:click="back(3)">{{__('back')}}</button>
            @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button"
                wire:click="fourtStepSubmit">{{__('continue')}} ></button>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                <svg class="c-icon">
                    <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                </svg>
            </a>
            <a class="btn btn-pill btn-warning btn-sm"
                style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
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
                <div style="text-align: left;" class="btn btn-block btn-primary">
                    {{ __('ANEXO E. DECLARACIÓN JURADA DE BENEFICIARIOS FINALES.')}}</div>
                <div class="form-group">
                    <div class="row">
                        <div style="border-color: red" class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <p><strong>Para este tipo de Persona no es necesario </strong> realizar la vinculación
                                    DECLARACIÓN JURADA DE BENEFICIARIOS FINALES</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button class="btn btn-pill btn-outline-dark nextBtn btn-sm pull-right" type="button"
                    wire:click="back(4)">{{__('back')}}</button>
                <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button"
                    wire:click="fifttStepSubmit">{{__('continue')}} ></button>
                <a class="btn btn-pill btn-warning btn-sm"
                    style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                    <svg class="c-icon">
                        <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                    </svg>
                </a>
                <a class="btn btn-pill btn-warning btn-sm"
                    style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
                    <svg class="c-icon">
                        <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-top"></use>
                    </svg>
                </a>
            </div>
            @else
            <div class="col-md-12">
                <hr>
                <div style="text-align: left;" class="btn btn-block btn-primary">
                    {{ __('ANEXO E. DECLARACIÓN JURADA DE BENEFICIARIOS FINALES.')}}</div>
                <div class="form-group">
                    <div class="row">
                        <div style="border-color: red" class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <p><strong>{{$qc5}}</strong> realiza la vinculación DECLARACIÓN JURADA DE BENEFICIARIOS
                                    FINALES</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <strong>Beneficiario Final:</strong> Es aquella persona natural que, directa o
                            indirectamente, posee o controla a una persona jurídica o un ente o estructura jurídica.
                            Por favor relacione a continuación <strong>la información de las personas naturales o
                                jurídicas que tienen el control</strong> (por ejemplo: grupos empresariales, matrices o
                            controlantes, o cualquier otra forma de control) o ejercen influencia, directamente o
                            indirectamente, en el cliente o proveedor:
                        </div>
                    </div>
                </div>
                <hr>
                <p>En este formulario es necesario especificar la información de los terceros, por favor seleccione una
                    de las siguientes opciones:</p>
                <ul>
                    <li><strong>(Opción 1)</strong> Son 1 o más Terceros Identificados.</li>
                    <li><strong>(Opción 2)</strong> Son más de 10 Terceros y los tengo previamente identificados.</li>
                    <li><strong>(Opción 3)</strong> No cuento o no suministro la información de BENEFICIARIOS FINALES
                    </li>
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
                <div style="text-align: left;" class="btn btn-block btn-primary">
                    {{__('I. Información General de los Beneficiarios Finales')}}</div>
                <hr>

                <!-- // Si No hay BF  -->
                @if($moreCoincidences == 0)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="select_coincidencia" class="form-control-label"><strong>En caso de no
                                    suministrar la información requerida, a continuación se exponen los motivos que
                                    llevan a la no entrega, indicando claramente las normas en que se
                                    sustenta:</strong></label>
                            <textarea class="form-control" wire:model="adicional_text" rows="3"
                                placeholder="p. ej. No cuento con toda la información"></textarea>
                            @error('adicional_text') <span style="border-color: red;"
                                class="text-danger error">{{ $message }}</span>@enderror
                            <input type="file" wire:model="no_coincidence_file">
                            @error('no_coincidence_file') <span style="border-color: red;"
                                class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                @elseif($moreCoincidences == 1)
                <div class="row">
                    <div style="border-color: red" class="col-md-12">
                        <div class="alert alert-warning" role="alert">En caso de que una pregunta no aplique, llene el
                            campo como <strong>NO APLICA</strong>. - In case a question does not apply, fill in the
                            field as <strong>DOES NOT APPLY</strong></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-pill btn-success btn-sm" wire:click="addInput">Agregar
                                Tercero</button>
                        </div>
                        <hr>
                        @foreach ($inputs as $index => $input)
                        <div class="form-group card col-md-12 border-primary">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4>Información del Beneficiario #{{$index+1}}</h4>
                                </div>
                                <div class="col-sm-3">
                                    <button style="float: right; margin-left: -50%;" type="button"
                                        class="btn btn-pill btn-danger btn-sm" wire:click="removeInput({{ $index }})">
                                        <a>
                                            <svg class="c-icon">
                                                <use
                                                    xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-trash">
                                                </use>
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><strong>{{ __('Nombre Completo:')}}</strong></label>
                                        <input type="text" class="form-control"
                                            placeholder="Nombre Completo o Razón Social:"
                                            wire:model="full_name.{{$index}}" required>
                                        @error('full_name.{{$index}}') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>{{ __('qc22')}}:</strong></label>
                                    <select class=" form-control" name="document_beneficial_ownership.{{$index}}"
                                        wire:model="document_beneficial_ownership.{{$index}}">
                                        @foreach($document_types as $docs)
                                        <option value="{{$docs->id}}">{{$docs->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('document_beneficial_ownership.{{$index}}') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-3">
                                    <label><strong>{{ __('Documento de Identificación')}}:</strong></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="Número de Documento de Identificación:"
                                            wire:model="bf_document.{{$index}}" required>
                                        @error('bf_document.{{$index}}') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>{{ __('% Participación:')}}</strong></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            wire:model="participation_control.{{$index}}" placeholder="p. ej: 5%"
                                            required>
                                        @error('participation_control.{{$index}}') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>{{ __('Es PEP:')}}</strong></label>
                                    <select class="form-control-sm form-control" wire:model="is_pep.{{$index}}">
                                        <option value="">Seleccione una respuesta</option>
                                        <option value="1">Si</option>
                                        <option value="0">NO</option>
                                    </select>
                                    @error('is_pep.{{$index}}') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
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
                        <label for="amount_thirds"><strong>Cantidad total de terceros relacionados en el
                                adjunto:</strong></label>
                        <input type="number" wire:model="amount_thirds" class="form-control" id="amount_thirds"
                            min="10">
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
                    <p>Por favor adjunte el archivo donde se encuentren sus terceros</p>
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
                <button class="btn btn-pill btn-outline-dark nextBtn btn-sm pull-right" type="button"
                    wire:click="back(4)">{{__('back')}}</button>
                <button class="btn btn-pill btn-outline-primary nextBtn btn-sm pull-right" type="button"
                    wire:click="fifttStepSubmit">{{__('continue')}} ></button>
                <a class="btn btn-pill btn-warning btn-sm"
                    style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" onclick="scrollToBottom()">
                    <svg class="c-icon">
                        <use xlink:href="../../../assets/icons/coreui/free-symbol-defs.svg#cui-arrow-bottom"></use>
                    </svg>
                </a>
                <a class="btn btn-pill btn-warning btn-sm"
                    style="position: fixed; bottom: 60px; right: 20px; z-index: 9999;" onclick="scrollToTop()">
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
            <div style="text-align: left;" class="btn btn-block btn-primary">{{__('tc10')}}</div>
            <hr>
            @php $showMessage = true; @endphp
            @if($id_client_type == 6)
            @if($id_country == 1)
            @php $showMessage = false; @endphp
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc74')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc74" wire:model="qc74">
                            @error('qc74') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc75')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc75" wire:model="qc75">
                            @error('qc75') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc76')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc76" wire:model="qc76">
                            @error('qc76') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc77')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc77" wire:model="qc77">
                            @error('qc77') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc78')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc78" wire:model="qc78">
                            @error('qc78') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc79')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc79" wire:model="qc79">
                            @error('qc79') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc80')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc80" wire:model="qc80">
                            @error('qc80') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc81')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc81" wire:model="qc81">
                            @error('qc81') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc82')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc82" wire:model="qc82">
                            @error('qc82') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc83')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc83" wire:model="qc83">
                            @error('qc83') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc84')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc84" wire:model="qc84">
                            @error('qc84') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc85')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc85" wire:model="qc85">
                            @error('qc85') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc86')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc86" wire:model="qc86">
                            @error('qc86') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc87')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc87" wire:model="qc87">
                            @error('qc87') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc88')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc88" wire:model="qc88">
                            @error('qc88') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            @endif
            @if($id_country == 5)
            @php $showMessage = false; @endphp
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc74')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc74" wire:model="qc74">
                            @error('qc74') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc75')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc75" wire:model="qc75">
                            @error('qc75') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc76')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc76" wire:model="qc76">
                            @error('qc76') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc77')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc77" wire:model="qc77">
                            @error('qc77') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc78')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc78" wire:model="qc78">
                            @error('qc78') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc79')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc79" wire:model="qc79">
                            @error('qc79') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc80')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc80" wire:model="qc80">
                            @error('qc80') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc82')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc82" wire:model="qc82">
                            @error('qc82') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc83')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc83" wire:model="qc83">
                            @error('qc83') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc85')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc85" wire:model="qc85">
                            @error('qc85') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc86')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc86" wire:model="qc86">
                            @error('qc86') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc87')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc87" wire:model="qc87">
                            @error('qc87') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc88')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc88" wire:model="qc88">
                            @error('qc88') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            @else
            @php $showMessage = false; @endphp
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc74')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc74" wire:model="qc74">
                            @error('qc74') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc75')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc75" wire:model="qc75">
                            @error('qc75') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc76')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc76" wire:model="qc76">
                            @error('qc76') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc77')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc77" wire:model="qc77">
                            @error('qc77') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc78')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc78" wire:model="qc78">
                            @error('qc78') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc79')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc79" wire:model="qc79">
                            @error('qc79') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc80')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc80" wire:model="qc80">
                            @error('qc80') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc81')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc81" wire:model="qc81">
                            @error('qc81') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc82')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc82" wire:model="qc82">
                            @error('qc82') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc83')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc83" wire:model="qc83">
                            @error('qc83') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc84')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc84" wire:model="qc84">
                            @error('qc84') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc86')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc86" wire:model="qc86">
                            @error('qc86') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc87')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc87" wire:model="qc87">
                            @error('qc87') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><strong>{{__('qc88')}}:</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="qc88" wire:model="qc88">
                            @error('qc88') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            @endif
            @endif

            @if($id_client_type == 1)
            @if($id_country == 5)
            @php $showMessage = false; @endphp
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc89')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc89" wire:model="qc89">
                        @error('qc89') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif
            @endif

            @if($id_client_type == 5)
            @if($id_country == 1 || $id_country == 5)
            @php $showMessage = false; @endphp
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc90')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc90" wire:model="qc90">
                        @error('qc90') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc91')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc91" wire:model="qc91">
                        @error('qc91') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc92')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc92" wire:model="qc92">
                        @error('qc92') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif
            @endif

            @if($id_client_type == 3)
            @php $showMessage = false; @endphp
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc93')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc93" wire:model="qc93">
                        @error('qc93') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc94')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc94" wire:model="qc94">
                        @error('qc94') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc95')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc95" wire:model="qc95">
                        @error('qc95') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc96')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc96" wire:model="qc96">
                        @error('qc96') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif

            @if($id_client_type == 2)
            @if($id_country != 5)
            @php $showMessage = false; @endphp
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc97')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc97" wire:model="qc97">
                        @error('qc97') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc98')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc98" wire:model="qc98">
                        @error('qc98') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif
            @endif

            @if($id_client_type == 4)
            @php $showMessage = false; @endphp
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc100')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc100" wire:model="qc100">
                        @error('qc100') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{__('qc101')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="qc101" wire:model="qc101">
                        @error('qc101') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif

            @if($showMessage)
            <div class="alert alert-warning">
                <strong>Atención ==> </strong> No se encontraron documentos para el tipo de cliente o país.
            </div>
            @endif

            <hr>
            <button class="btn btn-pill btn-outline-dark nextBtn btn-sm pull-right" type="button"
                wire:click="back(5)">{{__('back')}}</button>
                <button class="btn btn-pill btn-primary btn-sm pull-right" type="button"
                    wire:loading.attr="disabled"
                    wire:target="sixtStepSubmit"
                    wire:click="sixtStepSubmit">
                    <span wire:loading.remove wire:target="sixtStepSubmit">{{__('submit')}} ></span>
                    <span wire:loading wire:target="sixtStepSubmit">Procesando...</span>
                </button>

        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 99 ? 'displayNone' : '' }}" id="step-99">

        <div class="col-md-12">
            <hr>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Solicitud Agregada Satisfactoriamente! - Request Added Satisfactorily!</h4>
                <hr>
                <p class="mb-0">Uno proveedor de Risk estará comunicandose con su información para continuar con su
                    proceso de homologación./A Risk provider will be communicating with your information to continue
                    with its approval process.</p>
            </div>
            <hr>
        </div>
    </div>
</div>