<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiInfluence extends Model
{
    use HasFactory;

    protected $table = 'sanofi_influences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'score'
    ];

    /**
     * Get the User that owns the Activity.

    public function user()
    {
        return $this->belongsTo('App\Models\Activity', 'users_id')->withTrashed();
    }
 	*/
}
