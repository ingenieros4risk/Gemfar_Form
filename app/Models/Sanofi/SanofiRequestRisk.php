<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestRisk extends Model
{
    use HasFactory;

    protected $table ='sanofi_request_risks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'id','dda', 'dds', 'user_solicitante','user_email','provider_name','provider_email', 'country_cpy',
        'provider_phone','purchase_order','date_solicitud','observation','paises',
        'country_homologation','number_order','migo','gr', 'status_id', 'user_responsable',
        'date_finalizacion', 'sanofi_form', 'sanofi_provider', 'risk_status', 'request_type',
        'hacat', 'condicion_pago ', 'nombre_comprador', 'area_solicitante', 'due_diligence', 
        'provider_id', 'nacionality', 'matriz_question','matriz_justification', 'terminos_question',
        'aprobacion_compra', 'manifestacion_suscrita'
    ];

    public function setPaisesAttribute($value)
    {
        $this->attributes['paises'] = json_encode($value);
    }

    public function getPaisesAttribute($value)
    {
        //return 0;
        return is_array($value) ? $value : json_decode($value);

        //return $this->attributes['paises'] = json_decode($value);
    }
}
