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
        'email', 'id_sociedad_solicitante', 'id_tipo_solicitud', 'id_country',
        'client_id', 'password', 'id_user', 'date_solicitud', 'date_finalizacion'
    ];
}
