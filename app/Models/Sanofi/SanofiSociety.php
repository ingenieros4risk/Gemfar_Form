<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiSociety extends Model
{
    use HasFactory;

    protected $table = 'sanofi_societies';
    
    protected $fillable = [
        'name',
		'score'
    ]; 

}
