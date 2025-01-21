<?php

namespace App\Models\Inspektor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspektorPeriodicityList extends Model
{
    use HasFactory;

	protected $table = 'inspektor_periodicity_lists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name'
    ];
}
