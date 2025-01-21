<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenfarIndustryKey extends Model
{
    use HasFactory;
    protected $table ='genfar_industry_keys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		  'id', 'name', 'provider_id'
    ];
}
