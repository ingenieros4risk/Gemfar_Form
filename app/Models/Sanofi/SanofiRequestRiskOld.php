<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestRiskOld extends Model
{
    use HasFactory;

    protected $table ='sanofi_request_risk_olds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'id','user_solicitante','user_email','provider_name','provider_email','provider_phone','purchase_order','date_solicitud','observation','paises','country_homologation','number_order','migo','gr', 'status_id', 'date_finalizacion', 'sanofi_form', 'sanofi_provider', 'request_type', 'hacat', 'condicion_pago ', 'nombre_comprador', 'area_solicitante', 'due_diligence', 'nacionality' 
    ];

    public function setPaisesAttribute($value)
    {
        $this->attributes['paises'] = json_encode($value);
    }

    public function getPaisesAttribute($value)
    {
        return $this->attributes['paises'] = json_decode($value);
    }
    
}
