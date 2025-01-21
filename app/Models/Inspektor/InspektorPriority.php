<?php

namespace App\Models\Inspektor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspektorPriority extends Model
{
    use HasFactory;

    protected $table = 'inspektor_priorities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'number'
    ];
}
