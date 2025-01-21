<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiMemberSociety extends Model
{
    use HasFactory;

    protected $table = 'sanofi_member_societies';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
