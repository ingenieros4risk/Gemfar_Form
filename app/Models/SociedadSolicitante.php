<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SociedadSolicitante extends Model
{
    use HasFactory;
    protected $table = 'sociedad_solicitantes';

    protected $fillable = [
        'name'
    ];
}
