<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiHasBook extends Model
{
    use HasFactory;

    protected $table = 'sanofi_has_books';
    
    protected $fillable = [
        'name',
		'score'
    ]; 
}
