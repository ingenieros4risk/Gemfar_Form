<?php

namespace App\Console\Commands;

use App\Models\Sanofi\SanofiRequestForm;
use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Festive;
use App\Mail\GenfarNotifyAll;


use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


use Illuminate\Console\Command;

class NotificacionPendientes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificacion:pendientes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notificación de Solicitudes Pendientes por Aprobar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fecha_hoy = Carbon::now();

        if(!self::isFestive($fecha_hoy)) {
                    
            $requests_risk = SanofiRequestRisk::where('status_id',5)
            ->where('request_type','Homologación')
            ->where('id', '>', 447)
            ->get();
    

            $requests_risk_csr = [];
            $requests_risk_hys = [];
            $requests_risk_csy = [];
            $requests_risk_env = [];
            $requests_risk_ethics = [];
            $requests_risk_sarlaft = [];


            $ethicsCorreo  = array("santiago.pogo@genfar.com","daniela.martinezsilva@genfar.com","Nelson.Fonseca@genfar.com");
            $csrCorreo  = array("juanita.cuervo@genfar.com");
            $csyCorreo  = array("Ana.TorresVillalobos@genfar.com","Alexander.vidales@genfar.com");
            $hysCorreo  = array("carlos.Sanchez@genfar.com");
            $envCorreo  = array("carlos.Sanchez@genfar.com");
            $sarlaftCorreo  = array("nelson.fonseca@genfar.com");
            
            foreach ($requests_risk as $key) {
                $request_form = SanofiRequestForm::where('sanofi_request_risk_id', $key->id)->first();
                
                /*Evaluación CSR*/
                if($request_form->csr == 1 && $request_form->csr_comentario == null && ($request_form->csr_1 == 0 || $request_form->csr_2 == 0 ||
                $request_form->csr_3 == 0 || $request_form->csr_4 == 0 || $request_form->csr_5 == 0 ||
                $request_form->csr_6 == 0 || $request_form->csr_7 == 0 || $request_form->csr_9 == 0 || 
                $request_form->csr_10 == 0)){
                    $requests_risk_csr[] = $key;
                }
                /*Evaluación HYS*/
                if($request_form->hys == 1 && $request_form->hys_comentario == null && ($request_form->hys_1 == 0 || $request_form->hys_2 == 1 || $request_form->hys_3 == 1 || 
                $request_form->hys_4 == 1 || $request_form->hys_5 == 0 || $request_form->hys_6 == 0 || 
                $request_form->hys_7 == 0 || $request_form->hys_8 == 0)){
                    $requests_risk_hys[] = $key;
                } 
                /*Evaluación CSY*/
                if($request_form->csy == 1 && $request_form->csy_comentario == null && $request_form->csy_1 == 0){
                    $requests_risk_csy[] = $key;
                }
                /*Evaluación ENV*/
                if($request_form->env == 1 && $request_form->env_comentario == null && ($request_form->env_1 == 0 || $request_form->env_2 == 0 || $request_form->env_3 == 1 || $request_form->env_4 == 1 || $request_form->env_5 == 0 || $request_form->env_6 == 0 || $request_form->env_7 == 0 || $request_form->env_8 == 0)){
                    $requests_risk_env[] = $key;
                }           
                /*Evaluación ETHICHS*/
                if($request_form->ethics == 1 && $request_form->ebi_recomendacion != "Bandera(s)/señales de alerta adecuadamente mitigada(s)"){
                    $requests_risk_ethics[] = $key;
                }
                /*Evaluación SARLAFT*/
                if($request_form->sarlaft_comentario != "APROBADO" && ($request_form->coincidencia_laft == 1 || $request_form->antecedentes_disciplinarios == 1 || $request_form->antecedentes_penales == 1 || $request_form->antecedentes_fiscales == 1 || $request_form->coincidencia_pep == 1 || $request_form->coincidencia_listas == 1 || $request_form->coincidencia_fuentes == 1)){
                    $requests_risk_sarlaft[] = $key;
                }
            } 

            if(count($requests_risk_csr) > 0){
                $data = array(
                    'tickets' => $requests_risk_csr,
                    'amount' => count($requests_risk_csr),
                    'type' => "CSR"
                );
                Mail::to($csrCorreo)->send(new GenfarNotifyAll($data));
            }

            if(count($requests_risk_hys) > 0){
                $data = array(
                    'tickets' => $requests_risk_hys,
                    'amount' => count($requests_risk_hys),
                    'type' => "HYS"
                );
                Mail::to($hysCorreo)->send(new GenfarNotifyAll($data));
            }

            if(count($requests_risk_csy) > 0){
                $data = array(
                    'tickets' => $requests_risk_csy,
                    'amount' => count($requests_risk_csy),
                    'type' => "CSY"
                );
                Mail::to($csyCorreo)->send(new GenfarNotifyAll($data));
            }

            if(count($requests_risk_env) > 0){
                $data = array(
                    'tickets' => $requests_risk_env,
                    'amount' => count($requests_risk_env),
                    'type' => "ENV"
                );
                Mail::to($envCorreo)->send(new GenfarNotifyAll($data));
            }

            if(count($requests_risk_ethics) > 0){
                $data = array(
                    'tickets' => $requests_risk_ethics,
                    'amount' => count($requests_risk_ethics),
                    'type' => "Ethics"
                );
                Mail::to($ethicsCorreo)->send(new GenfarNotifyAll($data));
            }

            if(count($requests_risk_sarlaft) > 0){
                $data = array(
                    'tickets' => $requests_risk_sarlaft,
                    'amount' => count($requests_risk_sarlaft),
                    'type' => "SARLAFT"
                );
                Mail::to($sarlaftCorreo)->send(new GenfarNotifyAll($data));
            }

        }
    }

    public function isFestive($date){
        $festivos = Festive::all();
        foreach ($festivos as $dia_festivo) {
            $fechaFormatFestivo = Carbon::parse($dia_festivo->date)->format('y/m/d');
            $isFestive = ($date->format('y/m/d') == $fechaFormatFestivo ? true:false);
            if($isFestive){break;}
        }
        return $isFestive;
    }
}
