<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiProvider extends Model
{
    use HasFactory;

    protected $table = 'sanofi_providers';
    
    protected $fillable = [
        'name'
    ];


}
