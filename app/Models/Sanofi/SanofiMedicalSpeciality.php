<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiMedicalSpeciality extends Model
{
    use HasFactory;

    protected $table = 'sanofi_medical_specialities';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
