<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficialOwnershipForm extends Model
{
    use HasFactory;

    protected $table ='beneficial_ownership_forms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'id', 'country_id', 'document', 'name', 'sanofi_provider', 'status_form', 'date_form', 'form_type', 'provider_prepared',
        'provider_position', 'provider_sign', 'sanofi_verified', 'sanofi_date', 'sanofi_position', 'sanofi_comment', 'sanofi_recommendation',
        'sanofi_approval', 'has_beneficiaries', 'provider_justification'
    ];

}
