<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHomologationType extends Model
{
    use HasFactory;

    protected $table = 'sanofi_homologation_types';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
