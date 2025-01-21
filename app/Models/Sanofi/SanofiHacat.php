<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHacat extends Model
{
    use HasFactory;

    protected $table = 'sanofi_hacats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'ethics', 'csr', 'hys', 'env', 'csy', 'dda', 'category_b', 'category_c_hcp', 'category_c_hco'
    ];
}
