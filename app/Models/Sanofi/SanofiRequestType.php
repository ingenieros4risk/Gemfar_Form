<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestType extends Model
{
    use HasFactory;

    protected $table = 'sanofi_request_types';
    
    protected $fillable = [
        'name'
    ];
    
}
