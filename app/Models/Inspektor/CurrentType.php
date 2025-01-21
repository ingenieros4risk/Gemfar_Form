<?php

namespace App\Models\Inspektor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentType extends Model
{
    use HasFactory;

    protected $table = 'current_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'iso', 'symbol'
    ];

}
