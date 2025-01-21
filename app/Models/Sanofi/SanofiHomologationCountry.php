<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHomologationCountry extends Model
{
    use HasFactory;

    protected $table = 'sanofi_homologation_countries';
    
    protected $fillable = [
        'name',
        'money',
        'country',
        'score',
		'flag'
    ]; 
}
