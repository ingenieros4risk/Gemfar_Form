<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHasPublication extends Model
{
    use HasFactory;

    protected $table = 'sanofi_has_publications';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
