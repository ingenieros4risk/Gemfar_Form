<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupClients extends Model
{
    use HasFactory;

    protected $table ='group_clients';

    protected $fillable = [
        'name'
    ];
}
