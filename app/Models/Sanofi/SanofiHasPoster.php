<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHasPoster extends Model
{
    use HasFactory;

    protected $table = 'sanofi_has_posters';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
