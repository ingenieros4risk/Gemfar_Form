<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestUpdate extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'sanofi_request_updates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'selections', 'solicitante_name', 'solicitante_email','update_email','update_cuenta_bancaria','update_cuenta_bancaria_number','update_phone', 'update_nit','update_nit_number', 'update_name', 'date_fill', 'is_updated'
    ];
}
