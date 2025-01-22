<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoVendedores extends Model
{
    use HasFactory;

    protected $table ='grupo_vendedores';

    protected $fillable = [
        'name'
    ];
}
