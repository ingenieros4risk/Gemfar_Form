<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table ='clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_client_type', 'number_client', 'id_status', 'third_party_name', 'area_solicitante',
        'id_sales_organization', 'id_channel', 'id_sector', 'id_type_sale', 'id_group_client', 'id_oficina_ventas',
        'grupo_vendedores', 'vol_men_esti_comp', 'update_attachment_sales', 'name_comercial',
        'email', 'name_contact_client' ,'id_sociedad_solicitante', 'id_tipo_solicitud', 'id_country',
        'client_id', 'password', 'id_user', 'date_solicitud', 'date_finalizacion'
    ];

    // ==============================================
    //            RELACIONES 
    // ==============================================

    public function country()
    {
        return $this->belongsTo(Country::class, 'id_country');
    }

    public function tipoSolicitud()
    {
        return $this->belongsTo(TipoSolicitud::class, 'id_tipo_solicitud');
    }

    public function clientType()
    {
        return $this->belongsTo(ClientType::class, 'id_client_type');
    }

    public function salesOrganization()
    {
        return $this->belongsTo(SalesOrganization::class, 'id_sales_organization');
    }

    public function channel()
    {
        return $this->belongsTo(Channels::class, 'id_channel');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }

    public function typeSale()
    {
        return $this->belongsTo(TypeSale::class, 'id_type_sale');
    }

    public function groupClient()
    {
        return $this->belongsTo(GroupClients::class, 'id_group_client');
    }

    public function oficinaVentas()
    {
        return $this->belongsTo(Oficinas_Ventas::class, 'id_oficina_ventas');
    }

    public function sociedadSolicitante()
    {
        return $this->belongsTo(SociedadSolicitante::class, 'id_sociedad_solicitante');
    }
}
