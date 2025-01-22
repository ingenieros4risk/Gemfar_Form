<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficinas_Ventas extends Model
{
    use HasFactory;
    protected $table = 'oficinas_ventas';

    protected $fillable = [
        'name'
    ];
}
