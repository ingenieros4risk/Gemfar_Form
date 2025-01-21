<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficialOwnership extends Model
{
    use HasFactory;

    protected $table ='beneficial_ownerships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','forms_id','type_bf','adicional_text','no_coincidence_file','amount_thirds','coincidence_file',
        'document_beneficial_ownership', 'bf_document', 'full_name','participation_control','is_pep'
    ];

}
