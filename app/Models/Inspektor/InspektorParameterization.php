<?php

namespace App\Models\Inspektor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspektorParameterization extends Model
{
    use HasFactory;

	protected $table = 'inspektor_parameterizations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'type_id', 'color', 'value', 'message'
    ];
}
