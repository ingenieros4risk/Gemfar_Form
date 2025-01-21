<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestRiskStatus extends Model
{
    use HasFactory;

    protected $table = 'request_risk_statuses';
    
    protected $fillable = [
        'name'
    ];
}
