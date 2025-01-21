<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenfarSupliersCreation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'genfar_supliers_creations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'country_homologation',
        'provider_name',
        'provider_mail',
        'provider_phone',
        'genfar_provider',
        'genfar_society',
        'action',
        'industrykey',
        'solicitante',
        'nacionality',
        'paises',
        'buyer',
        'tax_id',
        'supplier_code_co',
        'supplier_code_ec',
        'supplier_code_pe',
        'comments',
        'cancel',
        'attachment',
        'hacat',
        'status',
        'id_genfar',
        'confirm',
        'approve',
        'approve_file',
        'confirm_file',
        'date_request',
        'date_updated',
        'date_approve',
        'date_confirm'
    ];

    
   
}
