<?php

namespace App\Models\Inspektor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspektorList extends Model
{
    use HasFactory;

	protected $table = 'inspektor_lists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'source', 'country_id', 'periodicity_id', 'group_id'
    ];
}
