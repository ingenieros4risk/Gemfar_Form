<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiAcademicPosition extends Model
{
    use HasFactory;

    protected $table = 'sanofi_academic_positions';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
