<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestStatus extends Model
{
    use HasFactory;

    protected $table = 'sanofi_request_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class'
    ];

    /**
     * Get the User that owns the Activity.
     */
    public function sanofiRequest()
    {
        return $this->belongsTo('App\Models\Activity', 'users_id')->withTrashed();
    }
}
