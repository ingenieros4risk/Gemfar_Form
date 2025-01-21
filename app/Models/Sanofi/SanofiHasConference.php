<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHasConference extends Model
{
    use HasFactory;

    protected $table = 'sanofi_has_conferences';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
