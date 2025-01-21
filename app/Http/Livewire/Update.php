<?php

namespace App\Http\Livewire;

use App\Models\Sanofi\SanofiRequestUpdate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class Update extends Component
{
    
    use WithFileUploads;

    public $currentStep = 1;
    public $sanofiUpdate, $nit, $banck;

    public $check_risk, $solicitante_name, $solicitante_email, $selections = [];

    public $update_name, $update_nit, $update_nit_number, $update_phone, $update_cuenta_bancaria_number, $update_email, $update_cuenta_bancaria, $date_fill, $is_updated, $update_contact;

    public function render()
    {
        return view('livewire.update');
    }

    
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'check_risk' => 'accepted'
        ],[
           'check_risk.accepted' => 'Para continuar, debe aceptar los términos establecidos' 
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        
        $validatedData = $this->validate([
            'solicitante_name' => 'required',
            'solicitante_email' => 'required',
            'selections' => 'required'
        ],[
            'solicitante_name.required' => 'Ingrese su nombre de contacto',
            'solicitante_email.required' => 'Ingrese su correo electrónico',
            'selections.required' => 'Seleccione un respusta'  
        ]);


        $multiple = implode(",", $this->selections);

        $this->sanofiUpdate = new SanofiRequestUpdate([
            'solicitante_name' => $this->solicitante_name,
            'solicitante_email' => $this->solicitante_email
        ]);

        

        $this->sanofiUpdate->save();
               
        $this->currentStep = 3;
    }



    public function thirdStepSubmit()
    {
        
        $validatedData = $this->validate([
            'update_name' => 'required'
        ],[
            'update_name.required' => 'Ingrese su Razón Social o Nombre Completo'  
        ]);

        $this->sanofiUpdate->update_name = $this->update_name;

        if(in_array(2,$this->selections)){

            $this->sanofiUpdate->update_nit_number = $this->update_nit_number;

            $update_nit = $this->update_nit;
            $fileReporteName = 'NIT'.'.'.$update_nit->getClientOriginalExtension();
            $this->sanofiUpdate->update(['update_nit' => $this->update_nit->storeAs('SANOFI/UPDATE/'.$this->sanofiUpdate->id, $fileReporteName ,'local')]);
        }

        if(in_array(3,$this->selections)){
           $this->sanofiUpdate->update_phone = $this->update_phone;
        }

        if(in_array(4,$this->selections)){
            $this->sanofiUpdate->update_email = $this->update_email;
        }

        if(in_array(5,$this->selections)){
            $this->sanofiUpdate->update_cuenta_bancaria_number = $this->update_cuenta_bancaria_number;

            $update_cuenta_bancaria = $this->update_cuenta_bancaria;
            $fileReporteName = 'CERTIFICADO_BANCARIO'.'.'.$update_cuenta_bancaria->getClientOriginalExtension();
            $this->sanofiUpdate->update(['update_cuenta_bancaria' => $this->update_cuenta_bancaria->storeAs('SANOFI/UPDATE/'.$this->sanofiUpdate->id, $fileReporteName ,'local')]);
        }

        if(in_array(6,$this->selections)){
            $this->sanofiUpdate->update_contact = $this->update_contact;
        }

        $this->sanofiUpdate->save();

        self::submitForm();

    }    

    public function submitForm()
    {   
        $fecha_hoy = Carbon::now();
        $multiple = implode(",", $this->selections);

        $this->sanofiUpdate->selections = $multiple;
        $this->sanofiUpdate->date_fill = $fecha_hoy;
        $this->sanofiUpdate->save();


        $this->currentStep = 99;

    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function back($step)
    {

        $this->currentStep = $step;    

    }
}
