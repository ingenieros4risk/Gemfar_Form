<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiMemberInvestigator extends Model
{
    use HasFactory;

    protected $table = 'sanofi_member_investigators';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
