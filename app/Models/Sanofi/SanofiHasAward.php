<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHasAward extends Model
{
    use HasFactory;

    protected $table = 'sanofi_has_awards';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
