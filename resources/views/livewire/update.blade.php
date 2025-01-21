<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
    @endif

    <div class="stepwizard">

        <div class="stepwizard-row setup-panel">

            <div class="stepwizard-step">

                <a type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>

                <p>{{__('sanofi_update_step_1')}}</p>

            </div>

            <div class="stepwizard-step">

                <a type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}" >2</a>

                <p>{{__('sanofi_update_step_2')}}</p>

            </div>


            <div class="stepwizard-step">

                <a type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" >3</a>

                <p>{{__('sanofi_update_step_3')}}</p>

            </div>


        </div>

    </div>

  

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-md-12">
            <hr>
            
            <div style="text-align: right;" class="btn btn-block btn-primary" >{{ __('informed_consent_RCGG')}}</div>

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
        </div>

    </div>

    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">

        <div class="col-md-12">

            <hr>

            <div style="text-align: right;" class="btn btn-block btn-primary" >{{__('sanofi_update_step_1_title')}}</div>

            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('solicitante_name')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="solicitante_name" wire:model="solicitante_name" class="form-control">
                        @error('solicitante_name') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>{{ __('solicitante_email')}}:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="solicitante_email" wire:model="solicitante_email" class="form-control">
                        @error('solicitante_email') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
                    
            <hr>
            <div class="form-group text-center">    
                <div class="col-md-12">
                    <label for=""><h4><strong>{{__('campos')}}:</strong></h4></label>
                    <div class="row">
                        <label class="col-md-3 col-form-label">{{__('campos_select')}}:</label>
                        <div class="col-md-9 col-form-label text-align">
                            <div class="form-check checkbox">
                              <input wire:model="selections.1" class="form-check-input" checked="on" type="checkbox" value="1">
                              <label class="form-check-label">Nombre o Razón Social</label>
                            </div>
                            <div class="form-check checkbox">
                              <input wire:model="selections.2" class="form-check-input" type="checkbox" value="2">
                              <label class="form-check-label">Número de Identificación Fiscal / Documento de Identificación</label>
                            </div>
                            <div class="form-check checkbox">
                              <input wire:model="selections.3" class="form-check-input" type="checkbox" value="3">
                              <label class="form-check-label">Teléfono</label>
                            </div>
                            <div class="form-check checkbox">
                              <input wire:model="selections.4" class="form-check-input" type="checkbox" value="4">
                              <label class="form-check-label">Correo Electrónico</label>
                            </div>
                            <div class="form-check checkbox">
                              <input wire:model="selections.5" class="form-check-input" type="checkbox" value="5">
                              <label class="form-check-label">Número de Cuenta Bancaria</label>
                            </div>
                            <div class="form-check checkbox">
                              <input wire:model="selections.6" class="form-check-input" type="checkbox" value="6">
                              <label class="form-check-label">Contacto (Ejecutivo de cuenta)</label>
                            </div>
                            @error('selections') <span style="border-color: red;" class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <br>

            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button" wire:click="back(1)">{{__('back')}}</button>
            
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button" wire:click.prevent="secondStepSubmit">{{__('continue')}} ></button>

        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">

        <div class="col-md-12">

            <hr>

            <div style="text-align: right;" class="btn btn-block btn-primary" >Formulario de Actualización</div>

            <hr>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Nombre Completo o Razón Social:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="update_name" wire:model="update_name" class="form-control">
                        @error('update_name') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @if(in_array(2,$selections))
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Número de Identificación Fiscal / Documento de Identificación:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="update_nit_number" wire:model="update_nit_number" class="form-control">
                        @error('update_nit_number') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Adjunte copia de Documento de Identificación/ Si es Internacional adjuntar Pasaporte :</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="update_nit" wire:model="update_nit">
                        @error('update_nit') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif            
            @if(in_array(3,$selections))
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Teléfono de contacto:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="update_phone" wire:model="update_phone" class="form-control">
                        @error('update_phone') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @endif
            @if(in_array(4,$selections))
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Correo Electrónico:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="update_email" wire:model="update_email" class="form-control">
                        @error('update_email') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @endif
            @if(in_array(5,$selections))
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Número de Cuenta Bancaria:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="update_cuenta_bancaria_number" wire:model="update_cuenta_bancaria_number" class="form-control">
                        @error('update_cuenta_bancaria_number') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Adjunte Certificación o carta bancaria menor a 90 días</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" name="update_cuenta_bancaria" wire:model="update_cuenta_bancaria">
                        @error('update_cuenta_bancaria') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif
            @if(in_array(6,$selections))
                <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><strong>Nombre de Contacto Ejecutivo:</strong></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="update_contact" wire:model="update_contact" class="form-control">
                        @error('update_contact') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @endif

            <button class="btn btn-pill btn-outline-error nextBtn btn-sm pull-right" type="button" wire:click="back(2)">{{__('back')}}</button>
            @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
                
            <button class="btn btn-pill btn-success nextBtn btn-sm pull-right" type="button" wire:click="thirdStepSubmit">{{__('continue')}} ></button>                

        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 99 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-md-12">
            <hr>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Solicitud de Actualización Agregada Satisfactoriamente! - Request Update Added Satisfactorily!</h4>
                <hr>
            </div>
            <hr>
        </div>
    </div>
</div>