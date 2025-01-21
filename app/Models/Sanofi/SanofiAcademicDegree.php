<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiAcademicDegree extends Model
{
    use HasFactory;

    protected $table = 'sanofi_academic_degrees';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
