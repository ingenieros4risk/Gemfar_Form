<?php

namespace App\Console\Commands;
use App\Models\Sanofi\GenfarSupliersCreation;
use App\Mail\eProveedoresApproveNotificaction;
use App\Mail\eProveedoresConfirmNotificaction;
use Illuminate\Console\Command;
use App\Models\Festive;
use Carbon\Carbon;

class NotificacionEproveedores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificacion:eproveedores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notificación de tareas E-proveedores Pendientes';

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

                    
            $requests_risk_no_approve = GenfarSupliersCreation::where('approve',NULL)->get();
            $requests_risk_no_confirm = GenfarSupliersCreation::where('status',0)->where('approve','APROBAR')->get();
            
            $userConfirm = array("milton.gomez@genfar.com");
            $userApprove = array("catherine.ramirez@genfar.com");
      
        
            
            $data_approve = array(
                'tickets' => $requests_risk_no_approve,
                'amount' => count($requests_risk_no_approve)
            );
    
            $data_confirm = array(
                'tickets' => $requests_risk_no_confirm,
                'amount' => count($requests_risk_no_confirm)
            );
    
            Mail::to($userApprove)->send(new eProveedoresApproveNotificaction($data_approve));
            Mail::to($userConfirm)->send(new eProveedoresConfirmNotificaction($data_confirm));
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
